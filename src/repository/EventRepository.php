<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Event.php';
require_once __DIR__ .'/../models/Location.php';

class EventRepository extends Repository
{

    public function getEvent(int $id): ?Event
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Events" join "Locations" on "Events"."event_locationID" = "Locations"."locationID"
            WHERE "eventID" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($event == false) {
            return null;
        }

        $location = new Location(
            $event['event_locationID'],
            $event['location_name']
        );

        $event = new Event(
            $event['event_name'],
            $event['description'],
            $event['event_date'],
            $location,
            $event['event_picture']
        );

        $event->setId($id);

        return $event;
    }

    public function addEvent(Event $event): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Events" (event_name, event_date, description, event_picture, "creatorID", "event_locationID", created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        session_start();
        $assignedById = $_SESSION["userid"];

        $stmt->execute([
            $event->getTitle(),
            $event->getDate(),
            $event->getDescription(),
            $event->getImage(),
            $assignedById,
            $event->getLocation()->getId(),
            $date->format('Y-m-d')
        ]);
    }

    public function getEvents(): array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM "Events" join "Locations" on "Events"."event_locationID" = "Locations"."locationID" order by created_at desc
        ');
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($events as $event){
            $location = new Location(
                $event['event_locationID'],
                $event['location_name']
            );
            $result[] = new Event(
                $event['event_name'],
                $event['description'],
                $event['event_date'],
                $location,
                $event['event_picture']
            );
            end($result)->setId($event["eventID"]);
        }
        return $result;
    }

    public function getEventByTitle(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';
        session_start();

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "Events" join "Locations" on "Events"."event_locationID" = "Locations"."locationID"
            left outer join "User_Interested_Events" on "Events"."eventID" = "User_Interested_Events"."interested_eventID"
            WHERE (LOWER(event_name) LIKE :search OR LOWER(description) LIKE :search) AND 
                  ("interested_userID" = :id OR "interested_userID" is NULL)
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->bindParam(':id', $_SESSION['userid'], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function interested(int $eventId){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "User_Interested_Events" ("interested_userID", "interested_eventID")
            VALUES (?, ?)
        ');
        session_start();
        var_dump($eventId);
        $userid = $_SESSION["userid"];
        $stmt->execute([
            $userid,
            $eventId
        ]);
    }

    public function uninterested(int $eventId){
        session_start();
        $stmt = $this->database->connect()->prepare('
            DELETE FROM "User_Interested_Events" WHERE "interested_userID" = ? and "interested_eventID" = ?
        ');
        $stmt->execute([
            $_SESSION["userid"],
            $eventId
        ]);
    }

    public function getInterestedEvents(){
        session_start();

        $stmt = $this->database->connect()->prepare('
            SELECT "interested_eventID" FROM "User_Interested_Events" 
            WHERE "interested_userID" = :id 
        ');
        $stmt->bindParam(':id', $_SESSION['userid'], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
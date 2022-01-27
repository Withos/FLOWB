<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{

    public function getEvent(int $id): ?Event
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.Events WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($event == false) {
            return null;
        }

        return new Event(
            $event['event_name'],
            $event['description'],
            $event['event_date'],
            $event['event_picture']
        );
    }

    public function addEvent(Event $event): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Events" (event_name, event_date, description, event_picture, "creatorID", "event_locationID", created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 3;
        $locationId = 1;

        $stmt->execute([
            $event->getTitle(),
            $event->getDate(),
            $event->getDescription(),
            $event->getImage(),
            $assignedById,
            $locationId,
            $date->format('Y-m-d')
        ]);
    }
}
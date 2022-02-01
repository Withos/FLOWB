<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Location.php';
require_once __DIR__.'/../models/tag.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
        SELECT "Users"."userID", email, password, name, surname, date_of_birth, "user_locationID", 
               location_name, profile_picture, bio, T."tagID", tag_name FROM public."Users" join "Locations" L on "Users"."user_locationID" = L."locationID" 
            left outer join "User_Tags" UT on "Users"."userID" = UT."userID" left outer join "Tags" T on 
            T."tagID" = UT."tagID" 
            WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $userdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($userdata == false){
            return null;
        }

        $user = new User(
            $userdata[0]['email'],
            $userdata[0]['password'],
            $userdata[0]['name'],
            $userdata[0]['surname'],
            $userdata[0]['date_of_birth']
        );

        $location = new Location($userdata[0]["user_locationID"], $userdata[0]["location_name"]);
        $user->setLocation($location);

        $user->setId($userdata[0]["userID"]);
        $user->setImage($userdata[0]["profile_picture"]);
        $user->setBio($userdata[0]["bio"]);
        $tags = [];

        foreach($userdata as $data ){
            $tags[] = new Tag($data["tagID"], $data["tag_name"]);
        }

        $user->setTags($tags);

        return $user;
    }

    public function getUserbyId(int $id): ?User{
        $stmt = $this->database->connect()->prepare('
        SELECT "Users"."userID", email, password, name, surname, date_of_birth, "user_locationID", 
               location_name, profile_picture, bio, T."tagID", tag_name FROM public."Users" join "Locations" L on "Users"."user_locationID" = L."locationID" 
            left outer join "User_Tags" UT on "Users"."userID" = UT."userID" left outer join "Tags" T on 
            T."tagID" = UT."tagID" 
            WHERE  "Users"."userID" = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $userdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($userdata == false){
            return null;
        }

        $user = new User(
            $userdata[0]['email'],
            $userdata[0]['password'],
            $userdata[0]['name'],
            $userdata[0]['surname'],
            $userdata[0]['date_of_birth']
        );

        $location = new Location($userdata[0]["user_locationID"], $userdata[0]["location_name"]);
        $user->setLocation($location);


        $user->setId($userdata[0]["userID"]);
        $user->setImage($userdata[0]["profile_picture"]);
        $user->setBio($userdata[0]["bio"]);
        $tags = [];

        foreach($userdata as $data ){
            if($data["tagID"] !==null )
                $tags[] = new Tag($data["tagID"], $data["tag_name"]);
        }

        $user->setTags($tags);

        return $user;
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Users" (name, surname, date_of_birth, email, password)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getDateOfBirth(),
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }

    public function getUserId(User $user): ?int{
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public."Users" WHERE email = :email
        ');

        $email = $user->getEmail();

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return $user["userID"];
    }

    public function getUsers(): array{
        $result = [];
        $currentid = 0;

        session_start();

        $stmt = $this->database->connect()->prepare('
        SELECT "Users"."userID", email, password, name, surname, date_of_birth, "user_locationID", 
               location_name, profile_picture, bio, T."tagID", tag_name 
            FROM public."Users" join "Locations" L on "Users"."user_locationID" = L."locationID" 
            left outer join "User_Tags" UT on "Users"."userID" = UT."userID" 
            left outer join "Tags" T on T."tagID" = UT."tagID" where "Users"."userID" != :id order by "Users"."userID"
        ');

        $stmt->bindParam(':id', $_SESSION['userid'], PDO::PARAM_INT);

        $stmt->execute();

        $usersdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($usersdata as $userdata) {
            if($userdata["userID"] !== $currentid) {
                $currentid = $userdata["userID"];
                $user = new User(
                    $userdata['email'],
                    $userdata['password'],
                    $userdata['name'],
                    $userdata['surname'],
                    $userdata['date_of_birth']
                );

                $location = new Location($userdata["user_locationID"], $userdata["location_name"]);
                $user->setLocation($location);

                $user->setId($userdata["userID"]);
                $user->setImage($userdata["profile_picture"]);
                $user->setBio($userdata["bio"]);
                $tags = [];
                $result[] = $user;
            }

            if ($userdata["tagID"] !== null) {
                $tags[] = new Tag($userdata["tagID"], $userdata["tag_name"]);
            }

            $user->setTags($tags);
        }

        return $result;

    }

    public function getUsersByName(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';
        session_start();

        $stmt = $this->database->connect()->prepare('
            SELECT "Users"."userID", email, password, name, surname, date_of_birth, "user_locationID", 
               location_name, profile_picture, bio, T."tagID", tag_name 
            FROM public."Users" join "Locations" L on "Users"."user_locationID" = L."locationID" 
            left outer join "User_Tags" UT on "Users"."userID" = UT."userID" 
            left outer join "Tags" T on T."tagID" = UT."tagID" 
            where "Users"."userID" != :id order by "Users"."userID" 
            AND (LOWER(name) LIKE :search OR LOWER(surname) LIKE :search)
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->bindParam(':id', $_SESSION['userid'], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editUser(User $edituser){

        session_start();

        $name = $edituser->getName();
        $surname = $edituser->getSurname();
        $locationId = $edituser->getLocation()->getId();
        $image = $edituser->getImage();

        $stmt = $this->database->connect()->prepare('
            UPDATE "Users" SET name = :name, surname = :surname, "user_locationID" = :locid, 
                               profile_picture = :pfp WHERE "userID" = :id
        ');

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':locid', $locationId, PDO::PARAM_STR);
        $stmt->bindParam(':pfp', $image, PDO::PARAM_STR);
        $stmt->bindParam(':id', $_SESSION['userid'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
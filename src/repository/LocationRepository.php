<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Location.php';

class LocationRepository extends Repository
{
    public function getLocation(int $id): ?Location
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Locations" WHERE "locationID" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $location = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($location == false) {
            return null;
        }

        return new Location(
            $location['locationID'],
            $location['location_name'],
        );
    }

    public function getLocations(): array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM "Locations"
        ');
        $stmt->execute();
        $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($locations as $location){
            $result[] = new Location(
                $location['locationID'],
                $location['location_name']
            );
        }
        return $result;
    }

}
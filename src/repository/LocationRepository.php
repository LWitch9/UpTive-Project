<?php
require_once "Repository.php";
require_once "UserRepository.php";

class LocationRepository extends Repository
{
    public function addLocation(string $location){

        if($this->getLocationID($location) != null){
            return;
        }

        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.locations (name) VALUES(?);"
        );
        $statement->execute([$location]);
    }
    public function getLocationID(string $location ): ?int{
        $help_stat_loc = $this->database->connect()->prepare(
            "SELECT public.locations.id as id
                        FROM public.locations
                        WHERE (public.locations.name = ?);
                    "
        );


        $help_stat_loc->execute([$location]);
        $idLocation = $help_stat_loc->fetch(PDO::FETCH_ASSOC);
        return $idLocation['id'];
    }
    public function getAllLocations(): array{
        $result = [];
        $help_stat_loc = $this->database->connect()->prepare(
            "SELECT public.locations.name as name
                        FROM public.locations;
                    "
        );


        $help_stat_loc->execute();
        $locations = $help_stat_loc->fetchAll(PDO::FETCH_ASSOC);
        foreach ($locations as $location){
            $result[] = $location['name'];
        }
        return $result;
    }

}
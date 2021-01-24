<?php

require_once "Repository.php";
require_once "UserRepository.php";
class ActivityRepository extends Repository
{
    public function addActivity(string $activity){
        if($this->getActivityID($activity) != null){

            return;
        }
        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.activities (name) VALUES(?);"
        );
        $statement->execute([$activity]);
    }
    public function getAllActivities(): array{
        $result = [];
        $help_stat_loc = $this->database->connect()->prepare(
            "SELECT public.activities.name as name
                        FROM public.activities;
                    "
        );


        $help_stat_loc->execute();
        $activities= $help_stat_loc->fetchAll(PDO::FETCH_ASSOC);
        foreach ($activities as $activity){
            $result[] = $activity['name'];
        }
        return $result;
    }
    public function getAllActivitiesExcept(string $email): array{
        //TODO !!
        $result = [];
        $help_stat_loc = $this->database->connect()->prepare(
            "SELECT public.activities.name as name
                        FROM public.activities;
                    "
        );


        $help_stat_loc->execute();
        $activities= $help_stat_loc->fetchAll(PDO::FETCH_ASSOC);
        foreach ($activities as $activity){
            $result[] = $activity['name'];
        }
        return $result;
    }
    public function getActivityID(string $activity ): ?int{
        $help_stat = $this->database->connect()->prepare(
            "SELECT public.activities.id as id
                        FROM public.activities
                        WHERE (public.activities.name = ?);
                    "
        );


        $help_stat->execute([$activity]);
        $idActivity = $help_stat->fetch(PDO::FETCH_ASSOC);
        return $idActivity['id'];
    }
}
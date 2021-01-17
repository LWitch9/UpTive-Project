<?php
require_once "Repository.php";
require_once "UserRepository.php";
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{
    public function getEvent(int $id): ?Event
    {
        $userRepo = new UserRepository();
        //TODO end method
        //Polecenie pobrania danych z bazy
        //Statement with all needed data that has to be displayed
        $statement = $this->database->connect()->prepare(

            "SELECT * FROM view_events WHERE id = :id"
        );
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $event = $statement->fetch(PDO::FETCH_ASSOC);

        if($event == false){
           return null;
        }

        return new Event(
            $userRepo->getUser($event['email']),
            $event['activity'],
            $event['location'],
            $event['date'],
            $event['time'],
            $event['message']


        );
    }
    public function addEvent(Event $event){

        $date = new DateTime();
        $activityRepo = new ActivityRepository();
        $userRepo = new UserRepository();


         $statement = $this->database->connect()->prepare(
            "INSERT INTO public.events (id_assigned_by, location, date, time, message, created_at, id_activity) 
                    VALUES(?,?,?,?,?,?,?);"
        );

        $help_stat = $this->database->connect()->prepare(
            "SELECT public.activities.id as id
                        FROM activities
                        WHERE (public.activities.name = ?);
                    "
        );


        $help_stat->execute([$event->getActivity()]);
        $idActivity = $help_stat->fetch(PDO::FETCH_ASSOC);

        //TODO Pobrać na podstawie sesji
        $assignedById = $userRepo->getUserId($_COOKIE["user"]);
        $statement->execute([
            $assignedById,
            $event->getLocation(),
            $event->getDate(),
            $event->getTime(),
            $event->getMessage(),
            $date->format('Y-m-d'),
            $idActivity["id"]
            //$activityRepo->findActivityId($event->getActivity())

        ]);
    }
    public function getEvents(): array
    {
        $userRepo = new UserRepository();
        $result = [];

        $statement = $this->database->connect()->prepare(
            "SELECT * FROM view_events"
        );

        $statement->execute();
        $events = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event){
            $result[] = ['event'=>
                new Event(
                $event['activity'],
                $event['location'],
                $event['date'],
                $event['time'],
                $event['message']
                ), 'owner'=>
                $userRepo->getUser($event['email'])
                ];
        }
        return $result;
    }
    public function getEventOwnerId(int $id) : ?Event{

    }
}
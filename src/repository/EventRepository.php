<?php
require_once "Repository.php";
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{
    public function getProject(int $id): ?Event
    {
        //TODO end method
        //Polecenie pobrania danych z bazy
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM public.events WHERE id = :id'
        );
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $event = $statement->fetch(PDO::FETCH_ASSOC);

        if($event == false){
           return null;
        }

        return new Event(
            //TODO how to pass activity by id??
            $event['location'],
            $event['date'],
            $event['time'],
            $event['message'],
            $event['id_activity']

        );
    }
    public function addEvent(Event $event){

        $date = new DateTime();
        $activityRepo = new ActivityRepository();

        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.events (id_assigned_by, location, date, time, message, created_at, id_activity) 
                    VALUES(?,?,?,?,?,?,?);"
        );

        //TODO Pobrać na podstawie sesji
        $assignedById = 1;
        $tempActivityId =1;
        $statement->execute([
            $assignedById,
            $event->getLocation(),
            $event->getDate(),
            $event->getTime(),
            $event->getMessage(),
            $date->format('Y-m-d'),
            $tempActivityId
            //$activityRepo->findActivityId($event->getActivity())

        ]);
    }
}
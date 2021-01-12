<?php
require_once "Repository.php";
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{
    public function getEvent(int $id): ?Event
    {
        //TODO end method
        //Polecenie pobrania danych z bazy
        //Statement with all needed data that has to be displayed
        $statement = $this->database->connect()->prepare(
            "SELECT
                        public.users_details.name as name,
                        public.users_details.surname as surname,
                        public.users_details.bio as bio,
                        public.users_details.avatar as avatar,
                        public.events.location as location ,
                        public.events.date as date ,
                        public.events.time as time,
                        public.events.message as message,
                        public.events.created_at as created_at,
                        public.activities.name as activity,
                        public.events.type as type
                    FROM public.events
                        JOIN public.activities
                            ON public.events.id_activity = public.activities.id
                        JOIN public.users
                            ON public.events.id_assigned_by = public.users.id
                        JOIN public.users_details
                            ON public.users.id_user_details = public.users_details.id"
        );
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $event = $statement->fetch(PDO::FETCH_ASSOC);

        if($event == false){
           return null;
        }

        return new Event(
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


        $help_stat->execute();
        $idActivity = $help_stat->fetch(PDO::FETCH_ASSOC);

        //TODO Pobrać na podstawie sesji
        $assignedById = 1;
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
        $result = [];

        $statement = $this->database->connect()->prepare(
            "SELECT
                        public.users_details.name as name,
                        public.users_details.surname as surname,
                        public.users_details.bio as bio,
                        public.users_details.avatar as avatar,
                        public.events.location as location ,
                        public.events.date as date ,
                        public.events.time as time,
                        public.events.message as message,
                        public.events.created_at as created_at,
                        public.activities.name as activity,
                        public.events.type as type
                    FROM public.events
                        JOIN public.activities
                            ON public.events.id_activity = public.activities.id
                        JOIN public.users
                            ON public.events.id_assigned_by = public.users.id
                        JOIN public.users_details
                            ON public.users.id_user_details = public.users_details.id"
        );

        $statement->execute();
        $events = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event){
            $result[] = new Event(
                $event['activity'],
                $event['location'],
                $event['date'],
                $event['time'],
                $event['message']
            );
        }
        return $result;
    }
}
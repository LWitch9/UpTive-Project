<?php
require_once "Repository.php";
require_once "UserRepository.php";
require_once __DIR__.'/../models/Event.php';
require_once __DIR__.'/../models/User.php';

class EventRepository extends Repository
{
    private $date;
    private $time;
    public function __construct()
    {
        parent::__construct();
        $dateTime = new DateTime( );
        $dateTime->add(new DateInterval('PT1H')); // add one hour (it shows originally that it is 1 hour ealier);
        $this->date =$dateTime->format('Y-m-d');
        $this->time = $dateTime->format('H:i:s');
    }

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
            "SELECT * FROM view_events where (date > ? OR (date = ? AND time > ?))"
        );

        $statement->execute([$this->date,$this->date,$this->time]);
        $events = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event){
            $result[] = ['event'=>
                new Event(
                $event['activity'],
                $event['location'],
                $event['date'],
                $event['time'],
                $event['message']
                ),
                'id'=> $event['id'],
                'owner'=>
                $userRepo->getUser($event['email']),
                'participants'=>
                    $participants = $this->getParticipants($event['id'])
                ];
        }
        return $result;
    }
    public function getUsersEvents(string $email) : array{
        $userRepo = new UserRepository();
        $result = [];

        $statement = $this->database->connect()->prepare(
            "SELECT * FROM view_events WHERE (email = ? AND (date > ? OR (date = ? AND time > ?)))"
        );

        $statement->execute([$email,$this->date,$this->date,$this->time]);
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
                $userRepo->getUser($event['email']),
                'participants'=>
                    $participants = $this->getParticipants($event['id']),
                'request'=>
                    $request = $this->getRequestUser($event['id'])
            ];
        }
        return $result;
    }
    public function getParticipants(int $id) : array{
        $userRepo = new UserRepository();
        $result = [];

        $statement = $this->database->connect()->prepare(
            "SELECT
                        public.users_events_participants.id_event as id_event,
                        public.users_events_participants.added as added,
                        public.users.email as email
                    FROM public.users_events_participants
                             JOIN public.users
                                  ON public.users_events_participants.id_user = public.users.id
                    WHERE id_event = ? AND added = true;"
        );

        $statement->execute([$id]);
        $participants = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($participants as $participant){
            $result[] = $userRepo->getUser($participant['email']);
        }
        return $result;
    }
    public function getRequestUser(int $id) : ?User{
        $userRepo = new UserRepository();
        $result = [];

        $statement = $this->database->connect()->prepare(
            "SELECT
                        public.users_events_participants.id_event as id_event,
                        public.users_events_participants.added as added,
                        public.users.email as email
                    FROM public.users_events_participants
                             JOIN public.users
                                  ON public.users_events_participants.id_user = public.users.id
                    WHERE id_event = ? AND added = false;"
        );

        $statement->execute([$id]);
        $participant = $statement->fetch(PDO::FETCH_ASSOC);
        if($participant == false){
            return null;
        }
        return $userRepo->getUser($participant['email']);
    }
    public function getEventIdByData(string $assigned_by, string $location, string $date,string $time): ?Event
    {
        $statement = $this->database->connect()->prepare(
            "SELECT id FROM events 
                        where (location = ? AND date = ? AND time = ? AND id_assigned_by = ?);"
        );

        $statement->execute([$this->date,$this->date,$this->time]);
        $events = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addRequestParticipant(int $userID, int $eventID){
        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.users_events_participants (id_user,id_event, added) 
                    VALUES(?,?,false);"
        );
        $statement->execute([
            $userID,
            $eventID
        ]);
    }

}
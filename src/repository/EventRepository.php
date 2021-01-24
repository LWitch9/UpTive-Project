<?php
require_once "Repository.php";
require_once "UserRepository.php";
require_once __DIR__.'/../models/Event.php';
require_once __DIR__.'/../models/User.php';

class EventRepository extends Repository
{
    private $date;
    private $time;
    private $activityRepository;
    private $locationRepository;
    public function __construct()
    {
        parent::__construct();

        $this->activityRepository = new ActivityRepository();
        $this->locationRepository = new LocationRepository();

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
            $event['activity'],
            $event['location'],
            $event['date'],
            $event['time'],
            $event['message']
        );
    }
    public function addEvent(Event $event){

        $date = new DateTime();
        $userRepo = new UserRepository();


         $statement = $this->database->connect()->prepare(
            "INSERT INTO public.events (id_assigned_by, id_location, date, time, message, created_at, id_activity) 
                    VALUES(?,?,?,?,?,?,?);"
        );

        $assignedById = $userRepo->getUserId($_COOKIE["user"]);
        $statement->execute([
            $assignedById,
            $this->locationRepository->getLocationID($event->getLocation()),
            $event->getDate(),
            $event->getTime(),
            $event->getMessage(),
            $date->format('Y-m-d'),
            $this->activityRepository->getActivityID($event->getActivity())

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
    public function getUserAssignedEvents(string $email) : array{
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
                ), 'id'=> $event['id'],
                'owner'=>
                $userRepo->getUser($event['email']),
                'participants'=>
                    $participants = $this->getParticipants($event['id']),
                'request'=>
                    $request = $this->getRequestUser($event['id'])
            ];
        }
        return $result;
    }
    public function getUserAssignedParticipatedEvents(string $email) : array{
        $userRepo = new UserRepository();
        $result = [];

        $statement2 = $this->database->connect()->prepare(
            "SELECT *
                        FROM view_events_participants
                        WHERE (
                            ( id_assigned_by = ? AND added = false)
                            AND (date > ? OR (date = ? AND time > ?))
                        );"
        );
        $assignedID = $userRepo->getUserId($email);
        $statement2->execute([$assignedID,$this->date,$this->date,$this->time]);

        $events_as_owner = $statement2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($events_as_owner as $event){
            $result[] = ['event'=>
                new Event(
                    $event['activity'],
                    $event['location'],
                    $event['date'],
                    $event['time'],
                    $event['message']
                ), 'id'=> $event['id'],
                'owner'=> $userRepo->getUser($email),
                'participants'=>
                    $participants = $this->getParticipants($event['id']),
                'request'=>
                    $request = $userRepo->getUser($event['email'])
            ];
        }

        $statement = $this->database->connect()->prepare(
            "SELECT *
                        FROM view_events_participants
                        WHERE (
                            (email = ? AND added = false)
                            AND (date > ? OR (date = ? AND time > ?))
                        );"
        );

        $statement->execute([$email,$this->date,$this->date,$this->time]);
        $events_as_participant = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events_as_participant as $event){
            $result[] = ['event'=>
                new Event(
                    $event['activity'],
                    $event['location'],
                    $event['date'],
                    $event['time'],
                    $event['message']
                ), 'id'=> $event['id'],
                'owner'=>
                    $userRepo->getUserByID($event['id_assigned_by']),
                'participants'=>
                    $participants = $this->getParticipants($event['id']),

            ];
        }

        return $result;
    }
    public function getExceptUserEvents(string $email) : array{
        $userRepo = new UserRepository();
        $result = [];

        $statement = $this->database->connect()->prepare(
            "SELECT * FROM view_events 
                        WHERE (email != ? AND (date > ? OR (date = ? AND time > ?)))
                        ORDER BY date, time;"
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
                ), 'id'=> $event['id'],
                'owner'=>
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
    public function getCalendarEvents(string $email) : array
    {
        $result = [];

        $statement = $this->database->connect()->prepare(
            "SELECT *
                      FROM (
                               SELECT id,email,location,date,time,message,created_at,activity, type
                               FROM view_events_participants
                                  WHERE (added = true)
                               UNION
                               SELECT *
                               FROM view_events
                           ) as tab
                      WHERE (email = ? AND (date > ? OR (date = ? AND time > ?)))
                      ORDER BY date, time;"
        );

        $statement->execute([$email,$this->date,$this->date,$this->time]);
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
    public function addParticipant(int $userID, int $eventID){
        $statement = $this->database->connect()->prepare(
            "UPDATE public.users_events_participants 
                    SET added = true
                    WHERE id_user = ? AND id_event = ?;"
        );
        $statement->execute([
            $userID,
            $eventID
        ]);
    }
    public function removeParticipant(int $userID, int $eventID){
        $statement = $this->database->connect()->prepare(
            "DELETE FROM public.users_events_participants
                    WHERE id_user = ? AND id_event = ?;"
        );
        $statement->execute([
            $userID,
            $eventID
        ]);
    }
}
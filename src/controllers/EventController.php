<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/Event.php';
require_once __DIR__.'/../repository/EventRepository.php';
require_once __DIR__.'/../repository/ActivityRepository.php';

class EventController extends AppController
{
    //private $messages = [];
    private $eventRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
    }
    public function search(){
        $events = $this->eventRepository->getEvents();
        $this->render('search',['events'=>$events]);
    }
    public function home(){
        if (!isset($_COOKIE['user'])){
            $this->render('login');
        }
        else{
            $events = $this->eventRepository->getUsersEvents($_COOKIE['user']);
            $this->render('home',['events'=>$events]);
        }

    }
    public function addEvent(){
        if(!$this->isPost())
            $this->render('addActivity');

        $event = new Event($_POST['activity'], $_POST['location'],$_POST['date'], $_POST['time'], $_POST['about']);
        $this->eventRepository->addEvent($event);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/profile");
    }

    public function request(){

        $userRepo = new UserRepository();
        if ( !$this->isPost() ){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location:{$url}/search");
        }

        $eventID = $_POST["eventID"];
        $participantID= $userRepo->getUserId($_COOKIE['user']);

        //TODO user cannot request to his event
        //TODO obsłużenie błędu ( jeżeli już taki request jest / jeżeli już taki user został dodany)
        $this->eventRepository->addRequestParticipant( $participantID, $eventID);


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/search");

    }

    public function accept(){
        $userRepo = new UserRepository();
        if ( !$this->isPost() ){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location:{$url}/home");
        }

        $participantID= $userRepo->getUserId($_POST['requestEmail']);
        $eventID = $_POST["eventID"];

        $this->eventRepository->addParticipant( $participantID, $eventID);


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/home");

    }
    public function reject(){
        $userRepo = new UserRepository();
        if ( !$this->isPost() ){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location:{$url}/home");
        }

        $participantID= $userRepo->getUserId($_POST['requestEmail']);
        $eventID = $_POST["eventID"];

        $this->eventRepository->removeParticipant( $participantID, $eventID);


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/home");
    }
}
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
    public function addEvent(){
        if(!$this->isPost())
            $this->render('addActivity');

        $event = new Event($_POST['activity'], $_POST['location'],$_POST['date'], $_POST['time'], $_POST['about']);
        $this->eventRepository->addEvent($event);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/home");
    }
}
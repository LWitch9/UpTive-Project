<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProfileController extends AppController
{
    private $userRepository;
    private $eventRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->eventRepository = new EventRepository();
    }

    public function profile(){
        if(isset($_COOKIE['user']) and $this->userRepository->getUser($_COOKIE['user'])){
            $user= $this->userRepository->getUser($_COOKIE['user']);
            $activities= $this->userRepository->getUserActivities($_COOKIE['user']);
            $achievements= $this->userRepository->getUserAchievements($_COOKIE['user']);
            $events = $this->eventRepository->getUserAssignedEvents($_COOKIE['user']);
            $calendars = $this->eventRepository->getCalendarEvents($_COOKIE['user']);
            $this->render('profile',['user'=>$user, 'activities'=>$activities, 'achievements'=>$achievements, 'events'=>$events, 'calendars'=>$calendars]);
        }
        else{
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

    }
    public function profileOtherUser(){

        if(isset($_COOKIE['user']) and $this->userRepository->getUser($_COOKIE['user']) and $this->isPost()){

            $email = $_POST["email"];
            $user= $this->userRepository->getUser($email );
            $activities= $this->userRepository->getUserActivities($email );
            $achievements= $this->userRepository->getUserAchievements($email );
            $events = $this->eventRepository->getUserAssignedEvents($email );
            $calendars = $this->eventRepository->getCalendarEvents($email );
            $this->render('profile',['user'=>$user, 'activities'=>$activities, 'achievements'=>$achievements, 'events'=>$events, 'calendars'=>$calendars]);
        }
        else{
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

    }
}
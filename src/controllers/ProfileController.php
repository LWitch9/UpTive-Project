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
        $user= $this->userRepository->getUser($_COOKIE['user']);
        $activities= $this->userRepository->getUserActivities($_COOKIE['user']);
        $achievements= $this->userRepository->getUserAchievements($_COOKIE['user']);
        $events = $this->eventRepository->getUserAssignedEvents($_COOKIE['user']);
        $calendars = $this->eventRepository->getCalendarEvents($_COOKIE['user']);
        $this->render('profile',['user'=>$user, 'activities'=>$activities, 'achievements'=>$achievements, 'events'=>$events, 'calendars'=>$calendars]);
    }
}
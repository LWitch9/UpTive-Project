<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProfileController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function profile(){
        $user= $this->userRepository->getUser($_COOKIE['user']);
        $activities= $this->userRepository->getUserActivities($_COOKIE['user']);
        $achievements= $this->userRepository->getUserAchievements($_COOKIE['user']);
        $this->render('profile',['user'=>$user, 'activities'=>$activities, 'achievements'=>$achievements]);
    }
}
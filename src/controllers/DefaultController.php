<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/LocationRepository.php';
require_once __DIR__.'/../repository/ActivityRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

    class DefaultController extends AppController{
        private $userRepository;
        private $activityRepository;
        private $locationRepository;
        public function __construct()
        {
            parent::__construct();
            $this->userRepository = new UserRepository();
            $this->activityRepository = new ActivityRepository();
            $this->locationRepository = new LocationRepository();
        }
        public function index(){
            $this->render('login');
        }

        public function settingsProfile(){

            if(isset($_COOKIE['user']) and $this->userRepository->getUser($_COOKIE['user'])){

                $user = $this->userRepository->getUser($_COOKIE['user']);
                $activities = $this->activityRepository->getAllActivities();
                $this->render('settings_profile',
                    ['user'=>$user, 'activities'=>$activities]
                );
            }
            else{
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/login");
                exit();
            }

        }
        public function settingsForm(){
            if(isset($_COOKIE['user']) and isset($_COOKIE['isAdmin']) and $_COOKIE['isAdmin'] and $this->userRepository->getUser($_COOKIE['user'])){

                $user = $this->userRepository->getUser($_COOKIE['user']);
                $this->render('settings_form',['user'=>$user]);
            }
            else{
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/login");
                exit();
            }


        }

        public function updateForm(){
            if(!$this->isPost()) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/settingsForm");
            }
            $location = $_POST['location'];
            $activity = $_POST['activity'];

            if($location  != null){
                $this->locationRepository->addLocation($location );
            }
            if($activity != null) {
                $this->activityRepository->addActivity($activity);
            }


            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/addActivity");
        }

    }

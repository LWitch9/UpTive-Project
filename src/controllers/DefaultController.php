<?php

    require_once 'AppController.php';

    class DefaultController extends AppController{
        public function index(){
            $this->render('login');
        }

        public function settingsProfile(){
            $userRepo = new UserRepository();
            $user = $userRepo->getUser($_COOKIE['user']);
            $this->render('settings_profile',['user'=>$user]);
        }
        public function settingsForm(){
            $userRepo = new UserRepository();
            $user = $userRepo->getUser($_COOKIE['user']);
            $this->render('settings_form',['user'=>$user]);
        }



    }

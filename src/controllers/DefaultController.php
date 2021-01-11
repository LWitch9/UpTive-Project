<?php

    require_once 'AppController.php';

    class DefaultController extends AppController{
        public function index(){
            $this->render('login');
        }

        public function home(){
             $this->render('home');
        }

        public function profile(){
            $this->render('profile');
        }
        public function addActivity(){
            $this->render('add_activity');
        }


    }

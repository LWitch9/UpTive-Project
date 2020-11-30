<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        //TODO zmienic na opcje z bazą danych - wersja tymczasowa;
        $user = new User("John Snow","jsnow@pk.edu.pl","admin");

        //Weryfikacja metody post/get
        if ( !$this->isPost() ){
            return $this->render('login');
        }

        //Przechwycenie danych z formularza logowania
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Sprawdzenie czy uzytkownik o tych danych istnieje
        //Jeśli nie istnieje przekaż komunikat
        if ($user->getEmail() != $email){
            return $this->render('login',['messages'=>['User with this email dosn\'t exist']]);
        }
        if ($user->getPassword() != $password){
            return $this->render('login',['messages'=>['Wrong password!']]);
        }

        //Jezeli istnieje przejdz na strone home
        //return $this->render('home');     //Alternatywnie przejscie na strone home

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location:{$url}/home");
    }
}
<?php

    require_once 'src/controllers/DefaultController.php';

    class Routing {
        public static $routes; // Tablica przechowująca url oraz ścieżkę do controlera

        public static function get($url, $controller){
            self::$routes[$url] = $controller;
        }

        public static function run($url) {
            $action = explode("/",$url)[0];

            if(!array_key_exists($action, self::$routes)){
                die("Wrong url!"); //Zatrzymuje wykonanie interpretera
            }

            $controller = self::$routes[$action];
            $object = new $controller; // Tworzenie obiektu DefaultController ze stringa!!!

            $object->$action();
        }
    }
?>
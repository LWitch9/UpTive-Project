<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); // trim pozwala pozbyć się / ze zmiennej globalnej $_SERVER
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('home','EventController');
Routing::get('profile','ProfileController');
Routing::get('addActivity','EventController');
Routing::get('events','EventController');
Routing::get('logout','SecurityController');
Routing::get('settingsProfile','DefaultController');
Routing::get('settingsForm','DefaultController');
Routing::get('people','EventController');
Routing::post('login','SecurityController');
Routing::post('signup','SecurityController');
Routing::post('addEvent','EventController');
Routing::post('request','EventController');
Routing::post('reject','EventController');
Routing::post('accept','EventController');
Routing::post('profileOtherUser','ProfileController');
Routing::post('searchBar','ProfileController');
Routing::post('updateProfile','ProfileController');
Routing::post('updateForm','DefaultController');

Routing::run($path);




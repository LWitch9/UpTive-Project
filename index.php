<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); // trim pozwala pozbyć się / ze zmiennej globalnej $_SERVER
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('home','DefaultController');
Routing::get('profile','DefaultController');
Routing::get('addActivity','DefaultController');
Routing::post('login','SecurityController');

Routing::run($path);




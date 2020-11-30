<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); // trim pozwala pozbyć się / ze zmiennej globalnej $_SERVER
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index','DefaultController');
Routing::get('home','DefaultController');
Routing::run($path);


?>

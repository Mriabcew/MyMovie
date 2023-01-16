<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('mainPage', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addMovie', 'MovieController');

Routing::run($path);
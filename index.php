<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('movies', 'MovieController');
Routing::get('settings', 'UserController');
Routing::get('register', 'DefaultController');
Routing::get('logout','SecurityController');
Routing::get('library','MovieController');
Routing::get('movie','MovieController');
Routing::get('updateData','DefaultController');
Routing::get('profile','UserController');
Routing::get('like','MovieController');
Routing::get('dislike','MovieController');

Routing::post('APIupdateData','UserController');
Routing::post('APIaddLibrary','MovieController');
Routing::post('login', 'SecurityController');
Routing::post('addMovie', 'MovieController');
Routing::post('top100','MovieController');
Routing::post('search','MovieController');
Routing::post('changePassword','SecurityController');
Routing::post('register','SecurityController');



Routing::run($path);
<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('events', 'EventController');
Router::get('people', 'UserController');
Router::get('chats', 'DefaultController');
Router::get('home', 'EventController');
Router::get('profile', 'UserController');
Router::get('event', 'EventController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('addEvent', 'EventController');
Router::post("search", 'EventController');
Router::post("interested", 'EventController');
Router::post("uninterested", 'EventController');
Router::post("logOut", 'SecurityController');
Router::post("editProfile", 'UserController');
Router::post("deleteEvent", 'EventController');
Router::run($path);
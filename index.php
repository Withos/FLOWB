<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('events', 'DefaultController');
Router::get('people', 'DefaultController');
Router::get('chats', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('profile', 'DefaultController');
Router::run($path);
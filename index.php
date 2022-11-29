<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('menu', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('addingPage','AddingPageController');
Router::post('ratingsPage','RatingsPageController');
Router::run($path);

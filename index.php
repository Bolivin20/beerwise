<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('menu', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register','RegistrationController');
Router::get('registration','DefaultController');
Router::post('ratingsPage','RatingsPageController');
Router::post('addBeer','AddingBeerController');

Router::run($path);

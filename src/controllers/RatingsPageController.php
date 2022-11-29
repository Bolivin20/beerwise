<?php

require_once 'AppController.php';

class RatingsPageController extends AppController
{
    public function ratingsPage()
    {
        return $this->render('ratings');
    }
}
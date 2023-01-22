<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        $this->render('login');
    }

    public function menu()
    {
        $this->render('menu');
    }

    public function registration()
    {
        $this->render('registration');
    }

}
<?php

require_once 'AppController.php';

class AddingPageController extends AppController
{
    public function addingPage()
    {
        return $this->render('adding');
        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/adding");
    }
}
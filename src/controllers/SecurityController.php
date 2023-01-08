<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repositories/UserRepo.php';

class SecurityController extends AppController
{
    public function login(){

        $userRepo = new UserRepo();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepo->getUser($email);
        
        if (!$user) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if(!password_verify($password, $user->getPassword())){
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }


        if(!isset($_COOKIE['id'])){
            setcookie('id', $userRepo->getId($email) , time() + 3600, '/');
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/menu");
    }

    public function logout()
    {
        if(isset($_COOKIE['id'])){
            setcookie('id', '', time() - 3600, '/');
        }

        return $this->render('login');
    }
}
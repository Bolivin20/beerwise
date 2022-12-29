<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repositories/UserRepo.php';

class RegistrationController extends AppController
{
    public function register()
    {
        $userRepo = new UserRepo();

        if (!$this->isPost()) {
            return $this->render('registration');
        }
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if ($password !== $password2) {
            return $this->render('registration', ['messages' => ['Passwords are not the same!']]);
        }

        $user = $userRepo->getUser($email);

        if ($user) {
            return $this->render('registration', ['messages' => ['User with this email already exist!']]);
        }

        $user = new User($email, $password, $name, $surname);
        $userRepo->addUser($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/menu");

    }
}
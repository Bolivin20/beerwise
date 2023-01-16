<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepo extends Repository
{
    public function addUser(User $user): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, surname, email, password, creation_date)
            VALUES (?, ?, ?, ?, ?)
        ');
        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword(),
            $date->format('Y-m-d')
        ]);
        $this->setRole($this->getId($user->getEmail()));
    }

    public function setRole(int $id_user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO roles (id_user, role)
            VALUES (?, ?)
        ');
        $stmt->execute([
            $id_user,
            0
        ]);
    }

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function getId(string $email): ?int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$id) {
            return null;
        }

        return $id['id'];
    }

    public function checkIfExist(string $email): bool
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        return true;
    }
}
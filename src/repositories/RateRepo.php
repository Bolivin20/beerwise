<?php


require_once 'Repository.php';
require_once __DIR__.'/../models/Rate.php';


class RateRepo extends Repository
{
    public function addRate(Rate $rate): void
    {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public.rates (rate, id_beer, id_user)
            VALUES (?, ?, ?)
        ');

            $stmt->execute([
                $rate->getRate(),
                $rate->getIdBeer(),
                $rate->getIdUser()
            ]);
    }

    public function checkIfRateExist($id_beer, $id_user): bool
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.rates WHERE id_beer = :id_beer AND id_user = :id_user
        ');
        $stmt->bindParam(':id_beer', $id_beer, PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $rate = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rate){
            return true;
        }
        return false;
    }

    public function updateRate($rate, $id_beer, $id_user): void
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.rates SET rate = :rate WHERE id_beer = :id_beer AND id_user = :id_user
        ');
        $stmt->bindParam(':rate', $rate, PDO::PARAM_INT);
        $stmt->bindParam(':id_beer', $id_beer, PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
    }
}
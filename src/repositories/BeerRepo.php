<?php

use Cassandra\Date;

require_once 'Repository.php';
require_once __DIR__.'/../models/Beer.php';

class BeerRepo extends Repository
{
    public function getBeer(int $id): ?Beer
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.beers WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $beer = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$beer) {
            return null;
        }

        return new Beer(
            $beer['title'],
            $beer['brewery'],
            $beer['style'],
            $beer['abv'],
            $beer['description'],
            $beer['img']
        );
    }

    public function addBeer(Beer $beer): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.beers (title, brewery, style, abv, description, img, creation_date, id_user)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        if(isset($_COOKIE['id'])) {
            $id_user = $_COOKIE['id'];
        }

        //$id_user = 1;

        $stmt->execute([
            $beer->getTitle(),
            $beer->getBrewery(),
            $beer->getStyle(),
            $beer->getAbv(),
            $beer->getDescription(),
            $beer->getImage(),
            $date->format('Y-m-d'),
            $id_user
        ]);
    }

    public function getBeers(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.beers ORDER BY id DESC;
        ');
        $stmt->execute();
        $beers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($beers as $beer) {
            $result[] = new Beer(
                $beer['title'],
                $beer['brewery'],
                $beer['style'],
                $beer['abv'],
                $beer['description'],
                $beer['img']
            );
        }

        return $result;
    }
}
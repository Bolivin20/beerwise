<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Beer.php';
require_once __DIR__.'/../models/Brewery.php';
require_once 'BreweryRepo.php';

class BeerRepo extends Repository
{
    /*public function getBeer(int $id): ?Beer
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
    }*/

    public function addBeer(Beer $beer): void
    {
        $breweryRepo = new BreweryRepo();

        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.beers (title, brewery, style, abv, description, img, creation_date, id_user, rate)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)
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
            $id_user,
            0

        ]);

        if(!$breweryRepo->checkIfExist($beer->getBrewery())){
            $breweryRepo->addBrewery($beer->getBrewery(), $this->getBeerId($beer->getTitle()));
        }
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
                $beer['img'],
                $beer['rate']
            );
        }

        return $result;
    }

    public function getBeerByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM beers WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBeersByBrewery(string $brewery): array
    {
        $brewery = strtolower($brewery);
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM beers WHERE LOWER(brewery) LIKE :brewery
        ');
        $stmt->bindParam(':brewery', $brewery, PDO::PARAM_STR);
        $stmt->execute();

        $beers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($beers as $beer) {
            $result[] = new Beer(
                $beer['title'],
                $beer['brewery'],
                $beer['style'],
                $beer['abv'],
                $beer['description'],
                $beer['img'],
                $beer['rate']
            );
        }
        return $result;
    }

    public function getToDisplayByTitle(string $title): Beer
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM beers WHERE title = :title
        ');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();

        $beer = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return new Beer(
            $beer[0]['title'],
            $beer[0]['brewery'],
            $beer[0]['style'],
            $beer[0]['abv'],
            $beer[0]['description'],
            $beer[0]['img'],
            $beer[0]['rate']
        );
    }

    public function getBeerId(string $title): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM beers WHERE title = :title
        ');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();

        $beer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $beer['id'];
    }

    public function updateDatabaseRate(float $rate, int $id): void
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE beers SET rate = :rate WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':rate', $rate, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getBreweryByBeer(string $title): string
    {
        $stmt = $this->database->connect()->prepare('
            SELECT brewery FROM beers WHERE title = :title
        ');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();

        $beer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $beer['brewery'];
    }
}
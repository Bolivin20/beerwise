<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Brewery.php';

class BreweryRepo extends Repository
{
    public function checkIfExist(string $name): bool
    {
        $name = strtolower($name);
        $stmt = $this->database->connect()->prepare('
            SELECT beers.brewery, breweries.name FROM beers INNER JOIN 
                breweries ON beers.brewery = breweries.name WHERE LOWER(breweries.name) = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $brewery = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$brewery) {
            return false;
        }

        return true;
    }

    public function addBrewery(string $name, int $id_beer): void
    {
        $brewery = new Brewery($name);
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.breweries (name, rate, id_beer)
            VALUES (?,?,?)
        ');

        $stmt->execute([
            $brewery->getName(),
            0,
            $id_beer

        ]);
    }

    public function getBreweries(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.breweries ORDER BY id DESC;
        ');
        $stmt->execute();
        $breweries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($breweries as $brewery) {
            $result[] = new Brewery(
                $brewery['name']
            );
        }

        return $result;
    }

    public function getBreweryByName(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM breweries WHERE LOWER(name) LIKE :searchBrewery
        ');
        $stmt->bindParam(':searchBrewery', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getToDisplayBrewery(string $name): Brewery
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM breweries WHERE name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $brewery = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return new Brewery(
            $brewery[0]['name'],
            $brewery[0]['rate']
        );
    }

    public function updateDatabaseBreweryRate(float $rate, string $name): void
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE breweries SET rate = :rate WHERE name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':rate', $rate, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getTop5Breweries(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.breweries ORDER BY rate DESC LIMIT 5;
        ');
        $stmt->execute();
        $breweries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($breweries as $brewery) {
            $result[] = new Brewery(
                $brewery['name'],
                $brewery['rate']
            );
        }

        return $result;
    }
}
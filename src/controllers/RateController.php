<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Rate.php';
require_once __DIR__.'/../repositories/RateRepo.php';
require_once __DIR__ .'/../models/Beer.php';
require_once __DIR__.'/../repositories/BeerRepo.php';
require_once __DIR__ .'/../models/Brewery.php';
require_once __DIR__.'/../repositories/BreweryRepo.php';

class RateController extends AppController
{
    private $rateRepo;
    private $beerRepo;
    private $breweryRepo;

    public function __construct()
    {
        parent::__construct();
        $this->rateRepo = new RateRepo();
        $this->beerRepo = new BeerRepo();
        $this->breweryRepo = new BreweryRepo();
    }

    public function addRate(){
        $rate = $_POST['rate'];
        $id_beer = $this->beerRepo->getBeerId($_POST['title']);
        $id_user = $_COOKIE['id'];
        $message = [];

        $rate = new Rate($rate, $id_beer, $id_user);

        if($this->rateRepo->checkIfRateExist($id_beer, $id_user)){
            $this->rateRepo->updateRate($rate->getRate(), $id_beer, $id_user);
            $message[] = 'Rate updated!';
        } else {
            $this->rateRepo->addRate($rate);
            $message[] = 'Rate added!';
        }
        $avgRate = $this->rateRepo->countAvgRate($id_beer);
        $this->beerRepo->updateDatabaseRate($avgRate, $id_beer);

        $breweryName = $this->beerRepo->getBreweryByBeer($_POST['title']);
        $avgBreweryRate = $this->rateRepo->countAvgBreweryRate($breweryName);
        $this->breweryRepo->updateDatabaseBreweryRate($avgBreweryRate, $breweryName);

        return $this->render('menu', [
            'beers' => $this->beerRepo->getBeers(),
            'breweries' => $this->breweryRepo->getBreweries(),
            'messages' => $message
        ]);
    }
}
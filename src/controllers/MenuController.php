<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Beer.php';
require_once __DIR__.'/../repositories/BeerRepo.php';
require_once __DIR__ .'/../models/Brewery.php';
require_once __DIR__.'/../repositories/BreweryRepo.php';

class MenuController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $beerRepo;
    private $breweryRepo;

    public function __construct()
    {
        parent::__construct();
        $this->beerRepo = new BeerRepo();
        $this->breweryRepo = new BreweryRepo();
    }

    public function menu()
    {
        $beers = $this->beerRepo->getBeers();
        $breweries = $this->breweryRepo->getBreweries();
        $this->render('menu', ['beers' => $beers, 'breweries' => $breweries]);
    }

    public function addBeer()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $beer = new Beer($_POST['title'],$_POST['brewery'],$_POST['style'],$_POST['abv'], $_POST['description'], $_FILES['file']['name']);
            $this->beerRepo->addBeer($beer);
            $this->message[] = 'Beer added!';

            return $this->render('menu', [
                'messages' => $this->message,
                'beers' => $this->beerRepo->getBeers(),
                'breweries' => $this->breweryRepo->getBreweries()
            ]);
        }
        return $this->render('adding', ['messages' => $this->message]);
    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->beerRepo->getBeerByTitle($decoded['search']));
        }
    }

    public function searchBrewery() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->breweryRepo->getBreweryByName($decoded['searchBrewery']));
        }
    }

    public function selected() {
        $title = $_GET['title'];
       return $this->render('selected', ['beer' => $this->beerRepo->getToDisplayByTitle($title)]);
    }

    public function selectedBrewery() {
        $name = $_GET['name'];
        return $this->render('selectedBrewery',
            ['brewery' => $this->breweryRepo->getToDisplayBrewery($name),
            'beers' => $this->beerRepo->getBeersByBrewery($name)]);
    }

    public function ratings(){
        $beers = $this->beerRepo->getTop5Beers();
        $breweries = $this->breweryRepo->getTop5Breweries();
        return $this->render('ratings', ['beers' => $beers, 'breweries' => $breweries]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}

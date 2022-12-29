<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Beer.php';
require_once __DIR__.'/../repositories/BeerRepo.php';

class AddingBeerController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $beerRepo;

    public function __construct()
    {
        parent::__construct();
        $this->beerRepo = new BeerRepo();
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

            return $this->render('menu', ['messages' => $this->message]);
        }
        return $this->render('adding', ['messages' => $this->message]);
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

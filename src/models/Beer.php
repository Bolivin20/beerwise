<?php

class Beer {
    private $title;
    private $brewery;
    private $style;
    private $abv;
    private $description;
    private $img;

    public function __construct($title, $brewery, $style, $abv, $description, $img)
    {
        $this->title = $title;
        $this->brewery = $brewery;
        $this->style = $style;
        $this->abv = $abv;
        $this->description = $description;
        $this->img = $img;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getBrewery()
    {
        return $this->brewery;
    }

    public function setBrewery($brewery)
    {
        $this->brewery = $brewery;
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function setStyle($style)
    {
        $this->style = $style;
    }

    public function getAbv()
    {
        return $this->abv;
    }

    public function setAbv($abv)
    {
        $this->abv = $abv;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->img;
    }

    public function setImage($img)
    {
        $this->img = $img;
    }
}
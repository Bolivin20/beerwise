<?php

class Beer {
    private $name;
    private $brewery;
    private $style;
    private $abv;
    private $description;
    private $image;

    public function __construct($name, $brewery, $style, $abv, $description, $image)
    {
        $this->name = $name;
        $this->brewery = $brewery;
        $this->style = $style;
        $this->abv = $abv;
        $this->description = $description;
        $this->image = $image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}
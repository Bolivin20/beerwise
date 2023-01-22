<?php

class Brewery
{
    private $name;
    private $rate;


    public function __construct($name, $rate = 0)
    {
        $this->name = $name;
        $this->rate = $rate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
    }
}


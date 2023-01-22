<?php

class Rate
{
    private $rate;
    private $id_beer;
    private $id_user;

    public function __construct(int $rate, int $id_beer, int $id_user)
    {
        $this->rate = $rate;
        $this->id_beer = $id_beer;
        $this->id_user = $id_user;
    }

    public function getRate(): int
    {
        return $this->rate;
    }

    public function getIdBeer(): int
    {
        return $this->id_beer;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setRate(int $rate)
    {
        $this->rate = $rate;
    }

    public function setIdBeer(int $id_beer)
    {
        $this->id_beer = $id_beer;
    }

    public function setIdUser(int $id_user)
    {
        $this->id_user = $id_user;
    }

}
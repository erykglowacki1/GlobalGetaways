<?php

class Destination
{

    private $city;
    private $price;

    /**
     * @param $city
     * @param $price
     */
    public function __construct($city, $price)
    {
        $this->city = $city;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


}
?>
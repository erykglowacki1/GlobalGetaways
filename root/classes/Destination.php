<?php

class Destination
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    private $city;
    private $price;

    private $description;


    /**
     * @param $city
     * @param $price
     * @param $description
     */
    public function __construct($city, $price, $description)
    {
        $this->city = $city;
        $this->price = $price;
        $this->description = $description;
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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}

?>
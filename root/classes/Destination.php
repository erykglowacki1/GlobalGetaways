<?php

class Destination
{
    private int $id;



    private string $city;
    private int $price;

    private string $description;

    /**
     * @param string $city
     * @param int $price
     * @param string $description
     */
    public function __construct(string $city, int $price, string $description)
    {
        $this->city = $city;
        $this->price = $price;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {

        $this->price = $price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }



    public function displayDestination()
    {
        echo "City: " . $this->getCity() . "\n";
        echo "Price: " . $this->getPrice() . "\n";
        echo "ID: " . $this->getId() . "\n";
    }


}

?>
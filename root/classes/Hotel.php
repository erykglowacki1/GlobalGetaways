<?php

class Hotel
{
    private $HotelId;

    /**
     * @return mixed
     */
    public function getHotelId()
    {
        return $this->HotelId;
    }

    /**
     * @param mixed $HotelId
     */
    public function setHotelId($HotelId): void
    {
        $this->HotelId = $HotelId;
    }

    //primary key
    private $hotelName;
    private $numRooms;
    private $price;

    private $destinationid;

    //getters and setters

    /**
     * @param $hotelName
     * @param $numRooms
     * @param $price
     * @param $destinationid
     */
    public function __construct($hotelName, $numRooms, $price, $destinationid)
    {
        $this->hotelName = $hotelName;
        $this->numRooms = $numRooms;
        $this->price = $price;
        $this->destinationid = $destinationid;
    }

    public function getHotelName()
    {
        return $this->hotelName;
    }

    public function getNumRooms()
    {
        return $this->numRooms;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDestinationid()
    {
        return $this->destinationid;
    }

    /**
     * @param mixed $hotelName
     */
    public function setHotelName($hotelName): void
    {
        $this->hotelName = $hotelName;
    }

    /**
     * @param mixed $numRooms
     */
    public function setNumRooms($numRooms): void
    {
        $this->numRooms = $numRooms;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function displayTestHotels()
    {
        echo $this->getHotelName();
        echo $this->getNumRooms();
        echo $this->getPrice();
    }
}

?>
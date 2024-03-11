<?php

class Hotel
{
    private $hotelId; //primary key
    private $hotelName;
    private $numRooms;
    private $price;
    public function __construct($hotelId, $hotelName, $numRooms, $price)
    {
        $this->hotelId = $hotelId;
        $this->hotelName = $hotelName;
        $this->numRooms = $numRooms;
        $this->price = $price;
    }
    //getters and setters
    public function getHotelId()
    {
        return $this->hotelId;
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
}
?>
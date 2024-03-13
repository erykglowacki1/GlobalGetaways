<?php

class Hotel
{
    //primary key
    private $hotelName;
    private $numRooms;
    private $price;
    public function __construct( $hotelName, $numRooms, $price)
    {

        $this->hotelName = $hotelName;
        $this->numRooms = $numRooms;
        $this->price = $price;
    }
    //getters and setters

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
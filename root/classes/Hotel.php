<?php

class Hotel
{
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

}
?>
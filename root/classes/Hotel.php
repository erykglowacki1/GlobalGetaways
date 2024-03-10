<?php

class Hotel
{
    private $hotelId; //primary key
    private $hotelName;
    private $numRooms;
    private $adminId; //foreign key

    public function __construct($hotelId, $hotelName, $numRooms, $adminId)
    {
        $this->hotelId = $hotelId;
        $this->hotelName = $hotelName;
        $this->numRooms = $numRooms;
        $this->adminId = $adminId;
    }
    //getters and setters
    public function getHotelId()
    {
        return $this->hotelId;
    }
    public function setHotelId($hotelId)
    {
        $this->hotelId = $hotelId;
    }
    public function getHotelName()
    {
        return $this->hotelName;
    }
    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;
    }
    public function getNumRooms()
    {
        return $this->numRooms;
    }
    public function setNumRooms($numRooms)
    {
        $this->numRooms = $numRooms;
    }
    public function getAdminId()
    {
        return $this->adminId;
    }
}
?>
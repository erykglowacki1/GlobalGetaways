<?php

class Flight
{
    public $flightId; //primary key
    public $distance;
    public $numBags;
    public $adminId; //foreign key

    public function __construct($flightId, $distance, $numBags, $adminId)
    {
        $this->flightId = $flightId;
        $this->distance = $distance;
        $this->numBags = $numBags;
        $this->adminId = $adminId;
    }

    //getters and setters
    public function getFlightId()
    {
        return $this->flightId;
    }
    public function setFlightId($flightId)
    {
        $this->flightId = $flightId;
    }
    public function getDistance()
    {
        return $this->distance;
    }
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }
    public function getNumBags()
    {
        return $this->numBags;
    }
    public function setNumBags($numBags)
    {
        $this->numBags = $numBags;
    }
    public function getAdminId()
    {
        return $this->adminId;
    }
}
?>
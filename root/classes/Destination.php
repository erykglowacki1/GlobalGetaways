<?php

class Destination
{
    private $destinationId; //primary key
    private $city;
    private $adminId; //foreign key


    public function __construct($destinationId, $city, $adminId)
    {
        $this->destinationId = $destinationId;
        $this->city = $city;
        $this->adminId = $adminId;
    }

    //getters and setters
    public function getDestinationId()
    {
        return $this->destinationId;
    }
    public function setDestinationId($destinationId)
    {
        $this->destinationId = $destinationId;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }
    public function getAdminId()
    {
        return $this->adminId;
    }
}
?>
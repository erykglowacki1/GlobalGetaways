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
}
?>
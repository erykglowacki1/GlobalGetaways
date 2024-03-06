<?php

class Destination
{
    public $destinationId; //primary key
    public $city;
    public $adminId; //foreign key

    public function __construct($destinationId, $city, $adminId)
    {
        $this->destinationId = $destinationId;
        $this->city = $city;
        $this->adminId = $adminId;
    }
}
?>
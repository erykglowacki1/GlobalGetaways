<?php

class Hotel
{
    public $hotelId; //primary key
    public $name;
    public $numRooms;
    public $adminId; //foreign key

    public function __construct($hotelId, $name, $numRooms, $adminId)
    {
        $this->hotelId = $hotelId;
        $this->name = $name;
        $this->numRooms = $numRooms;
        $this->adminId = $adminId;
    }
}
?>
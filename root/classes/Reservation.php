<?php

class Reservation
{
    public $reservationId; //primary key
    public $productId; //foreign key
    public $userId; //foreign key
    public $price;

    public function __construct($reservationId, $productId, $userId, $price)
    {
        $this->reservationId = $reservationId;
        $this->productId = $productId;
        $this->userId = $userId;
        $this->price = $price;
    }
}
?>
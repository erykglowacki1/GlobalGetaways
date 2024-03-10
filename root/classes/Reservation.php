<?php

class Reservation
{
    public $reservationId; //primary key
    public $price;
    public $productId; //foreign key
    public $userId; //foreign key

    public function __construct($reservationId, $price, $productId, $userId)
    {
        $this->reservationId = $reservationId;
        $this->price = $price;
        $this->productId = $productId;
        $this->userId = $userId;
    }
    //getters and setters
    public function getReservationId()
    {
        return $this->reservationId;
    }
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getProductId()
    {
        return $this->productId;
    }
    public function getUserId()
    {
        return $this->userId;
    }
}
?>
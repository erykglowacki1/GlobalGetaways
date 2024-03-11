<?php

class Reservation
{
    private $reservationId; //primary key
    private $totalPrice;
    private $productId;
    private $userId;

    public function __construct($reservationId, $totalPrice, $productId, $userId)
    {
        $this->reservationId = $reservationId;
        $this->totalPrice = $totalPrice;
        $this->productId = $productId;
        $this->userId = $userId;
    }
    //getters and setters
    public function getReservationId()
    {
        return $this->reservationId;
    }
    public function getPrice()
    {
        return $this->totalPrice;
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
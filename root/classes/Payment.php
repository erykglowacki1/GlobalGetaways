<?php

class Payment
{
    private $paymentId; //primary key
    private $cardNum;
    private $reservationId; //foreign key


    public function __construct($paymentId, $cardNum, $reservationId)
    {
        $this->paymentId = $paymentId;
        $this->cardNum = $cardNum;
        $this->reservationId = $reservationId;
    }
    //getters and setters
    public function getPaymentId()
    {
        return $this->paymentId;
    }
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }
    public function getCardNum()
    {
        return $this->cardNum;
    }
    public function setCardNum($cardNum)
    {
        $this->cardNum = $cardNum;
    }
    public function getReservationId()
    {
        return $this->reservationId;
    }
}
?>
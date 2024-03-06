<?php

class Payment
{
    public $paymentId; //primary key
    public $cardNum;
    public $reservationId; //foreign key

    public function __construct($paymentId, $cardNum, $reservationId)
    {
        $this->paymentId = $paymentId;
        $this->cardNum = $cardNum;
        $this->reservationId = $reservationId;
    }
}
?>
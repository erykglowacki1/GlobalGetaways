<?php

class Payment
{
    private $paymentId; //primary key
    private $cardNum;


    public function __construct($paymentId, $cardNum)
    {
        $this->paymentId = $paymentId;
        $this->cardNum = $cardNum;
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }
    public function getCardNum()
    {
        return $this->cardNum;
    }
}
?>
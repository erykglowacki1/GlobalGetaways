<?php

class Payment
{

    private $cardNum;

    /**
     * @param $cardNum
     */
    public function __construct($cardNum)
    {
        $this->cardNum = $cardNum;
    }

    /**
     * @return mixed
     */
    public function getCardNum()
    {
        return $this->cardNum;
    }

}
?>
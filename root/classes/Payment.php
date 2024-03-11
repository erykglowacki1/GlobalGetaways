<?php

class Payment
{

    private $cardNum;
    private $ownerName;

    /**
     * @param $cardNum
     * @param $ownerName
     */
    public function __construct($cardNum, $ownerName)
    {
        $this->cardNum = $cardNum;
        $this->ownerName = $ownerName;
    }

    /**
     * @return mixed
     */
    public function getCardNum()
    {
        return $this->cardNum;
    }

    /**
     * @return mixed
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }




}
?>
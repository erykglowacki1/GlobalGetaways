<?php

class Payment
{

    private $cardNum;
    private $ownerName;

    private $reservationid;

    /**
     * @param $cardNum
     * @param $ownerName
     * @param $reservationid
     */
    public function __construct($cardNum, $ownerName, $reservationid)
    {
        $this->cardNum = $cardNum;
        $this->ownerName = $ownerName;
        $this->reservationid = $reservationid;
    }

    /**
     * @return mixed
     */
    public function getReservationid()
    {
        return $this->reservationid;
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
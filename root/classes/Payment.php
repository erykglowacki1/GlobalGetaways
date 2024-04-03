<?php

class Payment
{

    private $cardNum;
    private $ownerName;

    private $user_id;
    private $product_id;

    /**
     * @param $cardNum
     * @param $ownerName
     * @param $user_id
     * @param $product_id
     */
    public function __construct($cardNum, $ownerName, $user_id, $product_id)
    {
        $this->cardNum = $cardNum;
        $this->ownerName = $ownerName;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }



    /**
     * @param $cardNum
     * @param $ownerName

     */




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
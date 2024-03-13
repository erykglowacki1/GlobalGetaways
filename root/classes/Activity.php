<?php

class Activity
{
    private $activityId; //primary key
    private $equipment;


    private $price;

    /**

     * @param $equipment

     * @param $price
     */
    public function __construct( $equipment, $price)
    {

        $this->equipment = $equipment;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function getEquipment()
    {
        return $this->equipment;
    }


}
?>
<?php

class Activity
{
   // private $activityId; //primary key
    private $equipment;

    private $destinationid;

    private $price;

    /**
     * @param $activityId
     * @param $equipment
     * @param $destinationid
     * @param $price
     */
    public function __construct($equipment, $price,$destinationid)
    {

        $this->equipment = $equipment;
        $this->price = $price;
        $this->destinationid = $destinationid;
    }

    /**
     * @return mixed
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param mixed $activityId
     */
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;
    }

    /**
     * @return mixed
     */
    public function getDestinationid()
    {
        return $this->destinationid;
    }

    /**
     * @param mixed $destinationid
     */
    public function setDestinationid($destinationid)
    {
        $this->destinationid = $destinationid;
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
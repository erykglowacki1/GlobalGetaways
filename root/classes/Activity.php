<?php

class Activity
{
    private $ActivityId;
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
        return $this->ActivityId;
    }

    /**
     * @param mixed $ActivityId
     */
    public function setActivityId($ActivityId): void
    {
        $this->ActivityId = $ActivityId;
    }

    /**
     * @return mixed
     */


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
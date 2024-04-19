<?php

class Activity
{
    private int $ActivityId;
    private string $equipment;

    private int $destinationid;

    private int $price;

    /**
     * @param $activityId
     * @param $equipment
     * @param $destinationid
     * @param $price
     */
    public function __construct($equipment, $price, $destinationid)
    {

        $this->equipment = $equipment;
        $this->price = $price;
        $this->destinationid = $destinationid;
    }

    public function getActivityId(): int
    {
        return $this->ActivityId;
    }

    public function setActivityId(int $ActivityId): void
    {
        $this->ActivityId = $ActivityId;
    }

    public function getEquipment(): string
    {
        return $this->equipment;
    }

    public function setEquipment(string $equipment): void
    {
        $this->equipment = $equipment;
    }

    public function getDestinationid(): int
    {
        return $this->destinationid;
    }

    public function setDestinationid(int $destinationid): void
    {
        $this->destinationid = $destinationid;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}
?>
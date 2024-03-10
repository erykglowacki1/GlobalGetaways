<?php

class Activity
{
    private $activityId; //primary key
    private $equipment;
    private $adminId; //foreign key


    public function __construct($activityId, $equipment, $adminId)
    {
        $this->activityId = $activityId;
        $this->equipment = $equipment;
        $this->adminId = $adminId;
    }

    //getters and setters
    public function getActivityId()
    {
        return $this->activityId;
    }
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;
    }
    public function getEquipment()
    {
        return $this->equipment;
    }
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
    }
    public function getAdminId()
    {
        return $this->adminId;
    }
}
?>
<?php

class Activity
{
    public $activityId; //primary key
    public $equipment;
    public $adminId; //foreign key

    public function __construct($activityId, $equipment, $adminId)
    {
        $this->activityId = $activityId;
        $this->equipment = $equipment;
        $this->adminId = $adminId;
    }
}
?>
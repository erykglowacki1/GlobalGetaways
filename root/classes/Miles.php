<?php

class Miles
{
    public $milesId;
    public $pointsNum;

    public function __construct($milesId, $pointsNum)
    {
        $this->milesId = $milesId;
        $this->pointsNum = $pointsNum;
    }
    //getters and setters
    public function getMilesId()
    {
        return $this->milesId;
    }
    public function setMilesId($milesId)
    {
        $this->milesId = $milesId;
    }
    public function getPointsNum()
    {
        return $this->pointsNum;
    }
    public function setPointsNum($pointsNum)
    {
        $this->pointsNum = $pointsNum;
    }
}
?>
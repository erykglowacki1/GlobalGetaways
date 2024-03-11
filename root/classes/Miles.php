<?php

class Miles
{
    private $milesId; //primary key
    private $pointsNum;

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
    public function getPointsNum()
    {
        return $this->pointsNum;
    }
}
?>
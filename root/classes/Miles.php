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
}
?>
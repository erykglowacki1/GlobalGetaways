<?php

class Miles
{
    private int $milesId; //primary key
    private int $pointsNum;

    public function __construct($milesId, $pointsNum)
    {
        $this->milesId = $milesId;
        $this->pointsNum = $pointsNum;
    }



}
?>
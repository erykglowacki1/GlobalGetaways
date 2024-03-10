<?php

class Flight
{

    private $distance;
    private $numBags;


    public function __construct( $distance, $numBags)
    {

        $this->distance = $distance;
        $this->numBags = $numBags;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @return mixed
     */
    public function getNumBags()
    {
        return $this->numBags;
    }

    /**
     * @param mixed $distance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    /**
     * @param mixed $numBags
     */
    public function setNumBags($numBags)
    {
        $this->numBags = $numBags;
    }


}
?>
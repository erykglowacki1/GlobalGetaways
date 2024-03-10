<?php

class Product
{
    private $productId; //primary key
    private $flightId; //foreign key
    private $activityId; //foreign key
    private $hotelId; //foreign key
    private $destinationId; //foreign key

    public function __construct($productId, $flightId, $activityId, $hotelId, $destinationId)
    {
        $this->productId = $productId;
        $this->flightId = $flightId;
        $this->activityId = $activityId;
        $this->hotelId = $hotelId;
        $this->destinationId = $destinationId;
    }
    //getters and setters
    public function getProductId()
    {
        return $this->productId;
    }
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
    public function getFlightId()
    {
        return $this->flightId;
    }
    public function getActivityId()
    {
        return $this->activityId;
    }
    public function getHotelId()
    {
        return $this->hotelId;
    }
    public function getDestinationId()
    {
        return $this->destinationId;
    }
}
?>
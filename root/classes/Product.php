<?php

class Product
{
    public $productId; //primary key
    public $flightId; //foreign key
    public $activityId; //foreign key
    public $destinationId; //foreign key

    public function __construct($productId, $flightId, $activityId, $destinationId)
    {
        $this->productId = $productId;
        $this->flightId = $flightId;
        $this->activityId = $activityId;
        $this->destinationId = $destinationId;
    }
}
?>
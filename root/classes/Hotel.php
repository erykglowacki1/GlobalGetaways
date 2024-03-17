<?php

class Hotel
{
    //primary key
    private $hotelName;
    private $numRooms;
    private $price;

    private $destinationid;

    //getters and setters

    /**
     * @param $hotelName
     * @param $numRooms
     * @param $price
     * @param $destinationid
     */
    public function __construct($hotelName, $numRooms, $price, $destinationid)
    {
        $this->hotelName = $hotelName;
        $this->numRooms = $numRooms;
        $this->price = $price;
        $this->destinationid = $destinationid;
    }

    public function getHotelName()
    {
        return $this->hotelName;
    }
    public function getNumRooms()
    {
        return $this->numRooms;
    }
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDestinationid()
    {
        return $this->destinationid;
    }

   public static function getHotelsByDestinationId($connection, $destination_id) {
        $sql = "SELECT * FROM Hotel WHERE Destination_id = :destination_id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
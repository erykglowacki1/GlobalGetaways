<?php


class HotelRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getHotelsByDestinationId($destinationId)
    {
        $sql = "SELECT * FROM Hotel WHERE Destination_id = :destinationId";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':destinationId', $destinationId, PDO::PARAM_INT);
        $statement->execute();
        $hotels = [];

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $hotel = new Hotel( $row['HotelName'], $row['NumOfRooms'], $row['Price'], $row['Destination_id']);
            $hotel->setHotelId($row['id']);
           $hotels[] = $hotel;
        }

        return $hotels;
    }
}
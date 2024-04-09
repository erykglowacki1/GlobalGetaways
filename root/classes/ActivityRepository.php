<?php

class ActivityRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getActivitiesByDestinationId($destinationId)
    {
        $sql = "SELECT * FROM Activity WHERE Destination_id = :destinationId";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':destinationId', $destinationId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
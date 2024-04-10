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
        $activities = [];

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $activity = new Activity($row['Equipment'], $row['Price'], $row['Destination_id']);
            $activity->setActivityID($row['id']);
            $activities[] = $activity;
        }

        return $activities;
    }
}

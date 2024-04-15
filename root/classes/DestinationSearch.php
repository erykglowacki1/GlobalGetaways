<?php

class DestinationSearch
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function searchDestination($search_place)
    {
        try {
            $sql = "SELECT * FROM Destination WHERE City = :City";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':City', $search_place, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll();

            if (count($result) == 0) {
                return null; // No results found
            }

            $destinations = [];
            foreach ($result as $row) {
                // Set the id property based on database record
                $destination = new Destination($row['City'], $row['Price'], $row['Description']);
                $destination->setId($row['id']);
                $destinations[] = $destination;
            }

            return $destinations;
        } catch (PDOException $error) {
            throw new Exception("An error occurred: " . $error->getMessage());
        }
    }
}
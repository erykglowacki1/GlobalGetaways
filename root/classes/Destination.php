<?php

class Destination
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    private $city;
    private $price;

    private $description;


    /**
     * @param $city
     * @param $price
     * @param $description
     */
    public function __construct($city, $price, $description)
    {
        $this->city = $city;
        $this->price = $price;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }




   public static function searchDestination($search_place, &$result, &$error_message)
    {
        global $connection;

        try {
            $sql = "SELECT * FROM Destination WHERE City = :City";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':City', $search_place, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll();

            if ($statement->rowCount() == 0) {
                $error_message = "No results found for " . htmlspecialchars($search_place) . ".";
            }
        } catch (PDOException $error) {
            $error_message = "An error occurred: " . $error->getMessage();
        }
    }
}

?>
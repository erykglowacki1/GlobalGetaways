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

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    public static function searchingFunction ()
    {
        $result = [];
        $error_message = "";

        if (isset($_POST['search_submit'])) {
            try {
                $search_place = $_POST['search_place'];
                $destinationSearch = new DestinationSearch($connection);
                $result = $destinationSearch->searchDestination($search_place);
                if ($result === null) {
                    $error_message = "No results found for " . htmlspecialchars($search_place) . ".";
                } else {
                    // getId() is the method to retrieve the ID of a destination
                    $_SESSION['destination_id'] = $result[0]->getId();
                }
            } catch (Exception $e) {
                $error_message = "An error occurred: " . $e->getMessage();
            }
        }
    }

}

?>
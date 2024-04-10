<?php

class Product
{
    private $productId; //primary key
    private $flightId;
    private $activityId;
    private $hotelId;
    private $destinationId;

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

    public static function addingToProduct($connection)
    {

// Handle form submission
        if (isset($_POST['submit'])) {

            if (!empty($_POST['destination_id'])) { // Assuming a form field named destination_id
                $destination_id = $_POST['destination_id']; // Retrieve destination_id from form submission
            } else {
                $destination_id = null;
            }

            if (!empty($_POST['activity_id'])) {
                $activity_id = $_POST['activity_id'][0]; // Assuming only one activity can be selected
            } else {
                $activity_id = null;
            }

            if (!empty($_POST['hotel_id'])) {
                $hotel_id = $_POST['hotel_id'][0]; // Assuming only one hotel can be selected
            } else {
                $hotel_id = null;
            }

            // Insert activities into Product table
            $sql = "INSERT INTO Product (Destination_id, Activity_id, Hotel_id) VALUES (:destination_id, :activity_id, :hotel_id)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
            $statement->bindParam(':activity_id', $activity_id, PDO::PARAM_INT);
            $statement->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
            $statement->execute();
            echo "Items were added to package";

            // Get the last inserted product ID
            $product_id = $connection->lastInsertId();

            // Store product ID in session
            $_SESSION['product_id'] = $product_id;

            // Redirect to payment page
            header("Location: purchasePage.php");
            exit();
        }

    }
}

?>
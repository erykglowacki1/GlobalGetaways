<?php

class Product
{
    private int $productId; //primary key
    private int $activityId;
    private int $hotelId;
    private int $destinationId;

    public function __construct($productId, $activityId, $hotelId, $destinationId)
    {
        $this->productId = $productId;

        $this->activityId = $activityId;
        $this->hotelId = $hotelId;
        $this->destinationId = $destinationId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }


    public function getActivityId(): int
    {
        return $this->activityId;
    }

    public function setActivityId(int $activityId): void
    {
        $this->activityId = $activityId;
    }

    public function getHotelId(): int
    {
        return $this->hotelId;
    }

    public function setHotelId(int $hotelId): void
    {
        $this->hotelId = $hotelId;
    }

    public function getDestinationId(): int
    {
        return $this->destinationId;
    }

    public function setDestinationId(int $destinationId): void
    {
        $this->destinationId = $destinationId;
    }


    public function displayProduct()
    {
        echo "Product ID: " . $this->getProductId() . "\n";

        echo "Activity ID: " . $this->getActivityId() . "\n";
        echo "Hotel ID: " . $this->getHotelId() . "\n";
        echo "Destination ID: " . $this->getDestinationId() . "\n";
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
            //Code taken off stack overflow
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
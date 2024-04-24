<?php

require "../../classes/DestinationSearch.php";
require "../../classes/Destination.php";
require "../../common.php";
require "../../connection/config.php";
require "../../connection/connectionToDB.php";
require "../../classes/User.php";
require "../../classes/Payment.php";
require "../../classes/Product.php";

class ValidationTests
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

//////TESTS LOGIN FEATURE////////
    public function testLogin()
    {
        session_start();
        $loginFeature = new User();
        $resultsLogin = $loginFeature->login("baban", "e");
        echo "VALIDATION TEST 1 RESULT : ";

        if ($resultsLogin == null) {
            echo "Login Failed <br>";
        } else {
            echo "Login Successful <br> ";
        }

    }

/////////TESTS OUR SEARCH FEATURE////////////

    public function testDisplaySearchResults($search_place)
    {
        $destinationSearch = new DestinationSearch($this->connection);
        $results = $destinationSearch->searchDestination($search_place);
        echo "VALIDATION TEST 2 RESULT : ";
        if ($results === null) {
            echo "No destinations found for $search_place<br>";
        } else {
            echo "Destinations found for $search_place:";
            foreach ($results as $destination) {
                echo "City: " . $destination->getCity() . ", Price: $" . $destination->getPrice() . ", Description: " . $destination->getDescription() . "\n";
            }
        }
    }
    /////////////TESTS PAYMENT METHOD///////////////
///I could not call the method from the original class as the require statements were breaking everything so this is slightly modified method,
/// still uses the same logic
    public function testPaymentFeature($cardNum, $ownerName, $product_id, $user_id)
    {
        require "../../connection/config.php";
        require "../../connection/connectionToDB.php";

        echo "<br>VALIDATION TEST 3 RESULT:";
        try {

            // Create an instance of Payment with form data
            $payment = new Payment($cardNum, $ownerName, $product_id, $user_id);


            $sql = "INSERT INTO Payment (CardNum, ownerName, Product_id, User_id) VALUES (:cardNum, :ownerName, :product_id, :user_id)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':cardNum', $cardNum);
            $statement->bindParam(':ownerName', $ownerName);
            $statement->bindParam(':product_id', $product_id);
            $statement->bindParam(':user_id', $user_id);
            $statement->execute();

            $_SESSION['useMileagePoints'] = isset($_POST['useMileagePoints']) && $_POST['useMileagePoints'] == 'yes';

            echo "PAYMENT WAS SUCCESSFULLY PROCESSED";
            return "";
        } catch (PDOException $error) {
            return $sql . "<br>" . $error->getMessage();
        }
    }


    //////////TESTS ADDING TO THE PRODUCT TABLE//////////
    public function testingAddingToProduct($submit, $destination_id, $activity_id, $hotel_id, $connection)
    {
        echo "<br>VALIDATION TEST 4 RESULT : ";

        // Handle form submission
        if ($submit) {

            if (!empty($destination_id)) {
                // Assuming a form field named destination_id
                $destination_id = $destination_id; // Retrieve destination_id from form submission
            } else {
                $destination_id = null;
            }

            if (!empty($activity_id)) {
                $activity_id = $activity_id; // Assuming only one activity can be selected
            } else {
                $activity_id = null;
            }

            if (!empty($hotel_id)) {
                $hotel_id = $hotel_id; // Assuming only one hotel can be selected
            } else {
                $hotel_id = null;
            }

            // Insert activities into Product table
            $sql = "INSERT INTO Product (Destination_id, Activity_id, Hotel_id) VALUES (:destination_id, :activity_id, :hotel_id)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
            $statement->bindParam(':activity_id', $activity_id, PDO::PARAM_INT);
            $statement->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);

            // Execute the query and check if the insertion was successful
            if ($statement->execute()) {
                echo "Items were added to package";
                $product_id = $connection->lastInsertId();
                
            } else {
                echo "Failed to add items to package";
                return false;
            }

        }
    }
}

// Instantiate the ValidationTests class
$validationTest = new ValidationTests($connection);

//// Test each feature
$validationTest->testLogin();
$validationTest->testDisplaySearchResults("New York");
$validationTest->testPaymentFeature('1234567890123456', 'John Doe', 150, 1);


// Mock form data for testing
$submit = true;
$destination_id = 14;
$activity_id = 14;
$hotel_id = 8;

// Call the method with the mock data and connection
$product_id = $validationTest->testingAddingToProduct($submit, $destination_id, $activity_id, $hotel_id, $connection);


?>



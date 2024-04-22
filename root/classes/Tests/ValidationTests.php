<?php

require "../../classes/DestinationSearch.php";
require "../../classes/Destination.php";
require "../../common.php";
require "../../connection/config.php";
require "../../connection/connectionToDB.php";
require "../../classes/User.php";

class ValidationTests
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }


//    public function testLoginFeature($email, $password)
//    {
//        $loginFeatureTest = new User($this->connection);
//        $loginFeatureTestResult = $loginFeatureTest->login($email, $password);
//        if ($loginFeatureTestResult == null) {
//            echo "Login was successful";
//        } else {
//            echo "Login was not successful";
//        }
//    }
//
//    public function testFeature2() {
//        // Code to test feature 2
//
//    }
//
//    public function testFeature3() {
//
//    }
//
//    public function testFeature4() {
//
//    }


//TESTS OUR SEARCH FEATURE
    public function displaySearchResults($search_place)
    {
        $destinationSearch = new DestinationSearch($this->connection);
        $results = $destinationSearch->searchDestination($search_place);

        if ($results === null) {
            echo "No destinations found for $search_place\n";
        } else {
            echo "Destinations found for $search_place:\n";
            foreach ($results as $destination) {
                echo "City: " . $destination->getCity() . ", Price: $" . $destination->getPrice() . ", Description: " . $destination->getDescription() . "\n";
            }
        }
    }
}

// Instantiate the ValidationTests class
$validationTest = new ValidationTests($connection);

//// Test each feature
//echo "LOGIN TEST VALIDATION";
//$validationTest->testLoginFeature("test@test.com","test");
//$validationTest->testFeature2();
//$validationTest->testFeature3();
//$validationTest->testFeature4();

// Test the search functionality
echo "SEARCH FEATURE VALIDATION";
$validationTest->displaySearchResults("New York");
?>
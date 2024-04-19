<?php

require "../../classes/DestinationSearch.php";
require "../../classes/Destination.php";
require "../../common.php";
   require "../../connection/config.php";
require "../../connection/connectionToDB.php";
class ValidationTests {
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }



//    public function testFeature1() {
//        // Code to test feature 1
//        echo "Testing Feature 1...\n";
//    }
//
//    public function testFeature2() {
//        // Code to test feature 2
//        echo "Testing Feature 2...\n";
//    }
//
//    public function testFeature3() {
//        // Code to test feature 3
//        echo "Testing Feature 3...\n";
//    }
//
//    public function testFeature4() {
//        // Code to test feature 4
//        echo "Testing Feature 4...\n";
//    }



//TESTS OUR SEARCH FEATURE
    public function displaySearchResults($search_place) {
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
//$validationTest->testFeature1();
//$validationTest->testFeature2();
//$validationTest->testFeature3();
//$validationTest->testFeature4();

// Test the search functionality
$validationTest->displaySearchResults("New York");
?>
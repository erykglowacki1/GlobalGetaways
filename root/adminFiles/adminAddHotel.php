<?php
require_once '../classes/Hotel.php';

if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../connection/connectionToDB.php';

        // Create an instance of Activity
        $hotel = new Hotel(
            $_POST['HotelName'],
            $_POST['NumOfRooms'],
            $_POST['Price']
        );

        // Prepare SQL statement
        $sql = "INSERT INTO Hotel (HOTELNAME, NUMOFROOMS, PRICE) VALUES (:HotelName,:NumOfRooms,:Price)";

        // Bind parameters + execute statement
        $statement = $connection->prepare($sql);
        $HotelName = $hotel->getHotelName();
        $statement->bindParam(':HotelName', $HotelName);
        $NumOfRooms = $hotel->getNumRooms();
        $statement->bindParam(':NumOfRooms', $NumOfRooms);
        $Price = $hotel->getPrice();
        $statement->bindParam(':Price', $Price);

        $statement->execute();

        echo $HotelName . ' successfully added';
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

require "../templates/header.php";
?>

<head>
    <link rel="stylesheet" href="../css/addDesign.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<h2>Add a Hotel</h2>
<form method="post">
    <label for="HotelName">Hotel Name</label>
    <input type="text" name="HotelName" id="HotelName">

    <label for="NumOfRooms">Num of Rooms available</label>
    <input type="number" name="NumOfRooms" id="NumOfRooms">

    <label for="Price">Price</label>
    <input type="number" name="Price" id="Price">

    <input type="submit" name="submit" value="Submit">
</form>


<span class="returnToPage"><a href="admin.php">Back to main admin page</a></span>




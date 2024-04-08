<?php
require_once '../classes/Activity.php';

if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../connection/connectionToDB.php';

        // Create an instance of Activity
        $activity = new Activity(
            $_POST['Equipment'],
            $_POST['Price'],
            $_POST['Destination_id']
        );

        // Prepare SQL statement
        $sql = "INSERT INTO Activity (Equipment, Price,Destination_id) VALUES (:equipment, :price,:Destination_id)";

        // Bind parameters + execute statement
        $statement = $connection->prepare($sql);
        $equipment = $activity->getEquipment();
        $statement->bindParam(':equipment', $equipment);
        $price = $activity->getPrice();
        $statement->bindParam(':price', $price);
        $destinationid = $activity->getDestinationid();
        $statement->bindParam("Destination_id",$destinationid);

        $statement->execute();

        echo $equipment . ' successfully added';
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}


?>

<head>
    <link rel="stylesheet" href="../css/addDesign.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<h2>Add an Activity</h2>
<form method="post">
    <label for="Equipment">Type of Trip being added</label>
    <input type="text" name="Equipment" id="Equipment">

    <label for="Price">Activity Price</label>
    <input type="number" name="Price" id="Price">

    <label for="Destination_id">ID for destination</label>
    <input type="number" name="Destination_id" id="Destination_id">

    <input type="submit" name="submit" value="Submit">
</form>


<span class="returnToPage"><a href="admin.php">Back to main admin page</a></span>



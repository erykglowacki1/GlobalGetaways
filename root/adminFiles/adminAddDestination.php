<?php
require_once '../classes/Destination.php';

if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../connection/connectionToDB.php';

        // Create an instance of Activity
        $activity = new Destination(
            $_POST['City'],
            $_POST['Price']
        );

        // Prepare the SQL statement
        $sql = "INSERT INTO Destination (City,Price) VALUES (:city,:price)";

        // Bind parameters and execute the statement
        $statement = $connection->prepare($sql);
        $city = $activity->getCity();
        $statement->bindParam(':city', $city);
        $price = $activity->getPrice();
        $statement->bindParam(':price',$price);


        $statement->execute();

        echo $city . ' successfully added';
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
<h2>Add a destination</h2>
<form method="post">
    <label for="City">City</label>
    <input type="text" name="City" id="City">
    <input type="submit" name="submit" value="Submit">

    <label for="Price">Activity Price</label>
    <input type="number" name="Price" id="Price">
</form>
<span class="returnToPage"> <a href="admin.php"">Back to main admin page</a></span>



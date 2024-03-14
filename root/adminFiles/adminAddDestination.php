<?php
require_once '../classes/Destination.php';

if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../connection/connectionToDB.php';

        // Create an instance of Activity
        $destination = new Destination(
            $_POST['City'],
            $_POST['Price'],
            $_POST['Description']
        );

        // Prepare the SQL statement
        $sql = "INSERT INTO Destination (City,Price,Description) VALUES (:city,:price,:description)";

        // Bind parameters and execute the statement
        $statement = $connection->prepare($sql);
        $city = $destination->getCity();
        $statement->bindParam(':city', $city);
        $price = $destination->getPrice();
        $statement->bindParam(':price',$price);
        $description = $destination->getDescription();
        $statement->bindParam(':description',$description);


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

    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">


    <label for="Price">Activity Price</label>
    <input type="number" name="Price" id="Price">
    <input type="submit" name="submit" value="Submit">
</form>
<span class="returnToPage"> <a href="admin.php"">Back to main admin page</a></span>



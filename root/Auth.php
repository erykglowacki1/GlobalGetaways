
<?php
require "templates/header.php";
try {
    require "common.php";
    require_once 'connection/connectionToDB.php';
    $sql = "SELECT * FROM Activity";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<h1>Add an Activity</h1>

<table>
    <thead>
    <tr>
        <th>Activity Type</th>
        <th>Price</th>
        <th>Add to package</th> <!-- Add column for the Buy button -->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["Equipment"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
            <td>
                <!-- Button to buy the Hotel -->
                <form method="post" action="purchasePage.php">
                    <input type="hidden" name="activity_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Buy">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php

try {
    $sql = "SELECT * FROM Hotel";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<h1>Add a Hotel</h1>

<table>
    <thead>
    <tr>
        <th>Hotel Name</th>
        <th>Number of rooms needed</th>
        <th>Price</th>
        <th>Add to package</th> <!-- Add column for the Buy button -->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["HotelName"]); ?></td>
            <td><?php echo escape($row["NumOfRooms"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
            <td>
                <!-- Button to buy the activity -->
                <form method="post" action="purchasePage.php">
                    <input type="hidden" name="activity_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Buy">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_submit'])) {
    // Retrieve the data from $_POST
    $city = isset($_POST['city']) ? $_POST['city'] : "";
    $description = isset($_POST['Description']) ? $_POST['Description'] : "";
    $price = isset($_POST['price']) ? $_POST['price'] : "";
    ?>

    <head>
        <link rel="stylesheet" href="css/booking.css">
    </head>
    <h2>Booking Details</h2>
    <table>
        <tr>
            <th>City</th>
            <td><?php echo $city; ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $description; ?></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><?php echo $price; ?></td>
        </tr>
    </table>
    <!-- Add a link to purchasePage.php -->
    <class id >
        <p>Ready to purchase? <a href="purchasePage.php">Proceed to purchase</a></p>
    </class>


    <?php
} else {
    // If form was not submitted, display a message
    echo "<p>No booking details found.</p>";
}
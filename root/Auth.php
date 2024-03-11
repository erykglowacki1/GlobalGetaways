<?php
require "templates/header.php";

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
    <?php
} else {
    // If form was not submitted, display a message
    echo "<p>No booking details found.</p>";
}
?>
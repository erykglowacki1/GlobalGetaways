<?php
require "templates/header.php";
require "classes/Destination.php";
require "classes/Activity.php";
require "classes/Hotel.php";

try {
    require "common.php";
    require_once 'connection/connectionToDB.php';

    // Check if destination_id is set
    if(isset($_POST['destination_id'])) {
        $destination_id = $_POST['destination_id'];

        // Query to retrieve activities linked to the specified destination
        $sql = "SELECT * FROM Activity WHERE Destination_id = :destination_id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
        $statement->execute();
        $activities_result = $statement->fetchAll();
    } else {
        // Handle if destination_id is not received
        echo "No destination_id received.";
        $activities_result = array(); // Empty result
    }
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

    <h2>Add an Activity</h2>

    <table>
        <thead>
        <tr>
            <th>Activity Type</th>
            <th>Price</th>
            <th>Add to package</th> <!-- Add column for the Buy button -->
        </tr>
        </thead>
        <tbody>
        <?php foreach ($activities_result as $row) : ?>
            <tr>
                <td><?php echo escape($row["Equipment"]); ?></td>
                <td><?php echo escape($row["Price"]); ?></td>
                <td>
                    <!-- Button to buy the activity -->
                    <form method="post" action="">
                        <input type="hidden" name="activity_id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Buy">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php

if(isset($destination_id)) {
    try {
        $sql = "SELECT * FROM Hotel WHERE Destination_id = :destination_id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
        $statement->execute();
        $hotels_result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
    <h2>Add a Hotel</h2>

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
        <?php foreach ($hotels_result as $row) : ?>
            <tr>
                <td><?php echo escape($row["HotelName"]); ?></td>
                <td><?php echo escape($row["NumOfRooms"]); ?></td>
                <td><?php echo escape($row["Price"]); ?></td>
                <td>
                    <!-- Button to buy the hotel -->
                    <form method="post" action="">
                        <input type="hidden" name="hotel_id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Buy">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
if (isset($_POST['destination_id'])) {
    $destination_id = $_POST['destination_id'];

    try {
        $sql = "SELECT Destination.City, Destination.Description, Destination.Price
                FROM Destination
                INNER JOIN Product ON Destination.id = Product.Destination_id 
                WHERE Product.Destination_id = :destination_id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
        $statement->execute();
        $booked_destinations = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

    $booked_destination_objects = array();
    foreach ($booked_destinations as $destination) {
        $booked_destination_objects[] = new Destination($destination['City'], $destination['Description'], $destination['Price']);
    }
}
?>

<?php if (!empty($booked_destination_objects)): ?>
    <!-- Display booked destination information -->
    <h2>Booked Destination Information</h2>
    <table>
        <?php foreach ($booked_destination_objects as $destination) : ?>
            <tr>
                <th>City</th>
                <td><?php echo escape($destination->getCity()); ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo escape($destination->getDescription()); ?></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><?php echo escape($destination->getPrice()); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No booked destination found.</p>
<?php endif; ?>
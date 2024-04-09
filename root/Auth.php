<?php
require "templates/header.php";
require "classes/Destination.php";
require "classes/Activity.php";
require "classes/Hotel.php";
require "common.php";
require_once 'connection/connectionToDB.php';

try {
    if(isset($_POST['destination_id'])) {
        $destination_id = $_POST['destination_id'];

        // Retrieve activities and hotels linked to the specified destination
        $activities_result = Activity::getActivitiesByDestinationId($connection, $destination_id);
        $hotels_result = Hotel::getHotelsByDestinationId($connection, $destination_id);
    } else {
        echo "No destination_id received.";
        $activities_result = [];
        $hotels_result = [];
    }
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<div class="form-container">
    <h2>Add an Activity</h2>
    <h2>Current Total Price :</h2>
    <form method="post" action="">
        <table class="activities-table">
            <thead>
            <tr>
                <th>Activity Type</th>
                <th>Price</th>
                <th>Add to package</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($activities_result as $row) : ?>
                <tr>
                    <td><?php echo escape($row["Equipment"]); ?></td>
                    <td><?php echo escape($row["Price"]); ?></td>
                    <td>
                        <input type="checkbox" name="activity_id[]" value="<?php echo $row['id']; ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Add a Hotel</h2>
        <table class="hotels-table">
            <thead>
            <tr>
                <th>Hotel Name</th>
                <th>Number of rooms needed</th>
                <th>Price</th>
                <th>Add to package</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($hotels_result as $row) : ?>
                <tr>
                    <td><?php echo escape($row["HotelName"]); ?></td>
                    <td><?php echo escape($row["NumOfRooms"]); ?></td>
                    <td><?php echo escape($row["Price"]); ?></td>
                    <td>
                        <input type="checkbox" name="hotel_id[]" value="<?php echo $row['id']; ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <input type="hidden" name="destination_id" value="<?php echo $destination_id; ?>">
        <input type="submit" name="submit" value="Add Selected to Package">
    </form>
</div>

<?php
// Handle form submission
if(isset($_POST['submit'])) {
    if (!empty($_POST['activity_id'])) {
        $activity_id = $_POST['activity_id'][0]; // Assuming only one activity can be selected
    } else {
        $activity_id = null;
    }

    if (!empty($_POST['hotel_id'])) {
        $hotel_id = $_POST['hotel_id'][0]; // Assuming only one hotel can be selected
    } else {
        $hotel_id = null;
    }

    // Insert activities into Product table
    $sql = "INSERT INTO Product (Destination_id, Activity_id, Hotel_id) VALUES (:destination_id, :activity_id, :hotel_id)";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
    $statement->bindParam(':activity_id', $activity_id, PDO::PARAM_INT);
    $statement->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
    $statement->execute();
    echo "Items were added to package";

    // Get the last inserted product ID
    $product_id = $connection->lastInsertId();

    // Store product ID in session
    $_SESSION['product_id'] = $product_id;

    // Redirect to payment page
    header("Location: purchasePage.php");
    exit();
}
?>


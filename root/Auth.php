<?php
require "templates/header.php";
require "classes/Destination.php";
require "classes/Activity.php";
require "classes/Hotel.php";

try {
    require "common.php";
    require_once 'connection/connectionToDB.php';

    if(isset($_POST['destination_id'])) {
        $destination_id = $_POST['destination_id'];

        // Query to retrieve activities linked to the specified destination
        $sql = "SELECT * FROM Activity WHERE Destination_id = :destination_id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
        $statement->execute();
        $activities_result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Handle if destination_id is not received
        echo "No destination_id received.";
        $activities_result = array(); // Empty result
    }

    if(isset($destination_id)) {
        $sql = "SELECT * FROM Hotel WHERE Destination_id = :destination_id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
        $statement->execute();
        $hotels_result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<h2>Add an Activity</h2>
<form method="post" action="">
    <table>
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
    <table>
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

<?php
// Handle form submission
if(isset($_POST['submit'])) {
    $activity_ids = isset($_POST['activity_id']) ? $_POST['activity_id'] : array();
    $hotel_ids = isset($_POST['hotel_id']) ? $_POST['hotel_id'] : array();

    // Insert selected activities into Product table
    foreach($activity_ids as $activity_id) {
        $sql = "INSERT INTO Product (Activity_id) VALUES (:activity_id)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':activity_id', $activity_id, PDO::PARAM_INT);
        $statement->execute();
    }

    // Insert selected hotels into Product table
    foreach($hotel_ids as $hotel_id) {
        $sql = "INSERT INTO Product (Hotel_id) VALUES (:hotel_id)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
        $statement->execute();
    }

    echo "Selected items added to package.";
}
?>

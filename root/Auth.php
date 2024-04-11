<?php
require "templates/header.php";
require "classes/Destination.php";
require "classes/Activity.php";
require "classes/Hotel.php";
require "classes/Product.php";
require "common.php";
require "classes/ActivityRepository.php";
require "classes/HotelRepository.php";
require_once 'connection/connectionToDB.php';
$activities_result = [];
$hotels_result = [];
try {
    if (isset($_POST['destination_id'])) {
        $destination_id = $_POST['destination_id'];
        echo "Destination ID received: " . $destination_id;
        // Retrieve activities and hotels linked to the specified destination
//        $activities_result = Activity::getActivitiesByDestinationId($connection, $destination_id);

        $activityRepository = new ActivityRepository($connection);
        $activities_result = $activityRepository->getActivitiesByDestinationId($destination_id);

        $hotelRepository = new HotelRepository($connection);
        $hotels_result = $hotelRepository->getHotelsByDestinationId($destination_id);

//        $hotels_result = Hotel::getHotelsByDestinationId($connection, $destination_id);

    } else {
        echo "No destination_id received.";

    }
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
} catch (Exception $e) {
}
?>
<head>
    <link rel="stylesheet" href="css/destinationPage.css"
</head>
<div class="form-container">
    <h2>Add an Activity</h2>
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
            <?php foreach ($activities_result as $activity) : ?>
                <tr>
                    <td><?php echo escape($activity->getEquipment()); ?></td>
                    <td><?php echo escape($activity->getPrice()); ?></td>
                    <td>
                        <input type="checkbox" name="activity_id[]" value="<?php echo $activity->getActivityId(); ?>">
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
                <th>Number of rooms available</th>
                <th>Price</th>
                <th>Add to package</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($hotels_result as $hotel) : ?>
                <tr>
                    <td><?php echo escape($hotel->getHotelName()); ?></td>
                    <td><?php echo escape($hotel->getNumRooms()); ?></td>
                    <td><?php echo escape($hotel->getPrice()); ?></td>
                    <td>
                        <input type="checkbox" name="hotel_id[]" value="<?php echo $hotel->getHotelId(); ?>">
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
require "templates/footer.php";
?>

<?php

Product::addingToProduct($connection);
?>


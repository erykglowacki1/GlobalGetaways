<?php
require 'templates/header.php';
require_once "classes/Payment.php";
require "classes/Destination.php";
if (isset($_POST['submit'])) {
    require "common.php";
    try {
        require_once 'connection/connectionToDB.php';

        // Check if the 'CardNum' and 'ownerName' keys exist in the $_POST array
        if (isset($_POST['CardNum']) && isset($_POST['ownerName'])) {
            // Create an instance of Activity
            $payment = new Payment(
                $_POST['CardNum'],
                $_POST['userName'],
                $_POST['reservationid']
            );

            // Prepare SQL statement
            $sql = "INSERT INTO Payment (CardNum,userName,Reservation_id) VALUES (:CardNum,:userName,:reservationid)";

            // Bind parameters + execute statement
            $statement = $connection->prepare($sql);
            $CardNum = $payment->getCardNum();
            $statement->bindParam(':CardNum', $CardNum);
            $userName = $payment->getOwnerName();
            $statement->bindParam(':userName',$userName);


            $statement->execute();

            echo "Payment Confirmed";
        } else {
            echo "CardNum and/or userName not set";
        }
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}

?>



<head>
    <link rel="stylesheet" href="css/payment.css">
</head>
<form method="post">

    <label for="CardNum">Card Number</label>
    <input type="number" name="CardNum" id="CardNum">

    <label for="expirationDate">Expiration Date</label>
    <input type="date" name="expirationDate" id="expirationDate">

    <label for="userName">CardHolders Name</label>
    <input type="text" name="userName" id="userName">

    <label for="cvv">CVV</label>
    <input type="number" name="cvv" id="cvv">

    <input type="submit" name="submit" value="submit">
</form>
<h2>Final Booking Information</h2>




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
    <h2>Everything you have booked so far :</h2>
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
    <a href="purchasePage.php" class="button">Proceed to Purchase</a>
<?php else: ?>
    <p>No booked destination found.</p>
<?php endif; ?>
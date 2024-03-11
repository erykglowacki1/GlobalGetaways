<?php
require 'templates/header.php';
require_once "classes/Payment.php";

if (isset($_POST['submit'])) {
    require "common.php";
    try {
        require_once 'connection/connectionToDB.php';

        // Check if the 'CardNum' and 'ownerName' keys exist in the $_POST array
        if (isset($_POST['CardNum']) && isset($_POST['ownerName'])) {
            // Create an instance of Activity
            $payment = new Payment(
                $_POST['CardNum'],
                $_POST['ownerName']
            );

            // Prepare SQL statement
            $sql = "INSERT INTO Payment (CardNum,ownerName) VALUES (:CardNum,:ownerName)";

            // Bind parameters + execute statement
            $statement = $connection->prepare($sql);
            $CardNum = $payment->getCardNum();
            $statement->bindParam(':CardNum', $CardNum);
            $ownerName = $payment->getOwnerName();
            $statement->bindParam(':ownerName',$ownerName);

            $statement->execute();

            echo "Payment Confirmed";
        } else {
            echo "CardNum and/or ownerName not set";
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

    <label for="ownerName">CardHolders Name</label>
    <input type="text" name="ownerName" id="ownerName">

    <label for="cvv">CVV</label>
    <input type="number" name="cvv" id="cvv">

    <input type="submit" name="submit" value="Submit">
</form>



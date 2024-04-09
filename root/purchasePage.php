<?php
require 'templates/header.php';
require_once "classes/Payment.php";
require "classes/Destination.php";
require "classes/Activity.php";
require "classes/Hotel.php";





// Check if the product_id is set in the session
if (isset($_SESSION['product_id'])) {
    $product_id = $_SESSION['product_id'];
    echo "Product ID: $product_id";
} else {
    echo "Product ID not found in session.";
}

// Check if the user_id is set in the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo "User ID: $user_id";
    // Now you can use $user_id on this page
} else {
    echo "User ID not found in session.";
}



?>


<?php

session_start();


if (isset($_POST['submit'])) {

    require "common.php";
    try {
        require_once 'connection/connectionToDB.php';

        // Assuming user and product IDs are already stored in the session
        $product_id = $_SESSION['product_id'];
        $user_id = $_SESSION['user_id'];

        // Create an instance of Payment with form data
        $payment = new Payment(
            $_POST['CardNum'],
            $_POST['ownerName'],
            $product_id,
            $user_id
        );


        $sql = "INSERT INTO Payment (CardNum, ownerName, Product_id, User_id) VALUES (:cardNum, :ownerName, :product_id, :user_id)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':cardNum', $payment->getCardNum());
        $statement->bindParam(':ownerName', $payment->getOwnerName());
        $statement->bindParam(':product_id', $product_id);
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();


        $_SESSION['useMileagePoints'] = isset($_POST['useMileagePoints']) && $_POST['useMileagePoints'] == 'yes';


        header("Location: final.php");
        exit();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<head>
    <link rel="stylesheet" href="css/payment.css">
</head>

<form method="post">

    <label for="cardNum">Card Number</label>
    <input type="number" name="CardNum" id="cardNum">

    <label for="expirationDate">Expiration Date</label>
    <input type="date" name="expirationDate" id="expirationDate">

    <label for="ownerName">CardHolders Name</label>
    <input type="text" name="ownerName" id="ownerName">

    <label for="cvv">CVV</label>
    <input type="number" name="cvv" id="cvv">


    <input type="hidden" name="reservation_id">

    <label for="useMileagePoints">Use Mileage Points?</label>
    <input type="checkbox" name="useMileagePoints" id="useMileagePoints" value="yes">

    <input type="submit" name="submit" value="Submit">
</form>

<?php
require 'templates/header.php';

if (isset($_POST['submit'])) {
    require "common.php";
    try {
        require_once 'connection/connectionToDB.php';

        // Create an instance of Activity
        $payment = new Payment(
            $_POST['cardNum']
        );

        // Prepare SQL statement
        $sql = "INSERT INTO Payment (CardNum) VALUES (:cardNum)";

        // Bind parameters + execute statement
        $statement = $connection->prepare($sql);
        $cardNum = $payment->getCardNum();
        $statement->bindParam(':cardNum', $cardNum);

        $statement->execute();

        echo "Payment Confirmed";
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}

?>

<head>
    <link rel="stylesheet" href="css/addDesign.css">
</head>
<form method="post">
    <label for="cardNumber">Card Number</label>
    <input type="number" name="cardNumber" id="cardNumber">


    <label for="expirationDate">Expiration Date</label>
    <input type="date" name="expirationDate" id="expirationDate">

    <label for="cardOwner">CardHolders Name</label>
    <input type="text" name="cardOwner" id="cardOwner">

    <label for="cvv">CVV</label>
    <input type="number" name="cvv" id="cvv">


    <input type="submit" name="submit" value="Submit">
</form>



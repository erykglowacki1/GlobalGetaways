<?php
require 'templates/header.php';
require_once "classes/Payment.php";
require "classes/Destination.php";

// Check if the product_id is set in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    echo "Product ID: $product_id";
} else {
    echo "Product ID not found in URL.";
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

    <input type="hidden" name="reservationid" value="<?php echo $product_id; ?>">
    <input type="submit" name="submit" value="submit">
</form>

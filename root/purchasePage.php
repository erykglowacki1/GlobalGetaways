<?php
require 'templates/header.php';
require_once "classes/Payment.php";
require "classes/Destination.php";
require "classes/Activity.php";
require "classes/Hotel.php";

Payment::checkForPassedIds();
Payment::settingPaymentInformation();

?>
<head>
    <link rel="stylesheet" href="css/payment.css">

</head>
<body>


<form method="post">

    <label for="cardNum">Card Number</label>
    <input type="text" name="CardNum" id="cardNum"  minlength="16" maxlength="16">

    <label for="expirationDate">Expiration Date</label>
    <input type="date" name="expirationDate" id="expirationDate">

    <label for="ownerName">CardHolders Name</label>
    <input type="text" name="ownerName" id="ownerName">

    <label for="cvv">CVV</label>
    <input type="text" name="cvv" id="cvv" minlength="3" maxlength="3">


    <input type="hidden" name="reservation_id">

    <label for="useMileagePoints">Use Mileage Points?</label>
    <input type="checkbox" name="useMileagePoints" id="useMileagePoints" value="yes">

    <input type="submit" name="submit" value="Submit">
</form>
</body>
<?php
require "templates/footer.php";
?>


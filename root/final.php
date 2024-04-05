<?php
require "templates/header.php";
echo "Thank you for shopping with Global Getaways. Check your email for booking confirmation";
?>

<body>
<h1>This is what you Booked : </h1>
<?php
require "connection/connectionToDB.php";
require "connection/config.php";
require "classes/finalSummary.php";

// Check if the product ID is set in the session
$summaryMethod = new finalSummary($connection);
$summaryMethod->displayBookingInformation();

?>
</body>

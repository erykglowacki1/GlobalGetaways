
<?php
require "templates/header.php";
?>

<body>
<div class="final-container">
    <h1 class="final-h1">This is what you Booked:</h1>
    <div class="final-summary">
        <?php
        require "connection/connectionToDB.php";
        require "connection/config.php";
        require "classes/finalSummary.php";
        // Display booking information
        finalSummary::displayBookingInformation();
        ?>
    </div>
    <div class="final-footer">
        <p>Thank you for choosing Global Getaways!</p>
    </div>
</div>
</body>

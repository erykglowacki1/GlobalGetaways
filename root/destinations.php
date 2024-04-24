<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Global Getaways</title>

</head>

<body>
<header>

    <div class="title-bar">
        <div class="global-getaways">
            <h1>Global Getaways</h1>
        </div>

        <div class="profile-button">
            <a href="profilePage.php" class="profile-link"><i class="fa-solid fa-user"></i></a>
        </div>

        <div class="login-button">
            <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
                <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul class="nav-links">
            <li><i class="fa-solid fa-house" style="color: #f5f1f1;"></i><a href="index.php">Home</a></li>
            <li><i class="fa-solid fa-location-dot" style="color: #f5f1f1;"></i><a href="destinations.php">Destinations</a></li>
            <li><i class="fa-solid fa-phone" style="color: #f5f1f1;"></i><a href="contact.php">Contact</a></li>

        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>


</header>
<?php
try {
    require_once 'connection/connectionToDB.php';
    require "common.php";
    $sql = "SELECT * FROM Destination";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<head>
    <link rel="stylesheet" href="css/destinationPage.css">
</head>
<h2 class="desth2">List of all of the destinations we offer</h2>
<?php if (!empty($success)) echo $success; ?>
<div class="container">
    <table class="destinations-table">
        <thead>
        <tr class="table-header-row">
            <th class="header-city">City</th>
            <th class="header-price">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr class="data-row">
                <td class="data-city"><?php echo escape($row["City"]); ?></td>
                <td class="data-price"><?php echo escape($row["Price"]); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<h2 class="gal">Gallery</h2>
<div class="image-grid">
    <div class="grid-item"><img src="destinations/London.jpeg" alt="Image 1"></div>
    <div class="grid-item"><img src="destinations/Albufeira.jpeg" alt="Image 2"></div>
    <div class="grid-item"><img src="destinations/Tokyo.jpeg" alt="Image 3"></div>
    <div class="grid-item"><img src="destinations/Split.jpeg" alt="Image 4"></div>
    <div class="grid-item"><img src="destinations/Whistler.jpeg" alt="Image 5"></div>
    <div class="grid-item"><img src="destinations/LA.jpeg" alt="Image 6"></div>
</div>



<?php
require "templates/footer.php";
?>





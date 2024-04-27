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


<head>

    <link rel="stylesheet" href="css/grid.css">
</head>


<h1 class="gal">Some Destinations We Offer</h1>
<div class="image-grid">
    <div class="grid-item">
        <img src="destinations/London.jpeg" alt="London">
        <div class="grid-item-details">
            <h2>London</h2>
            <p>Price: €2000</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/Albufeira.jpeg" alt="Albufeira">
        <div class="grid-item-details">
            <h2>Albufeira</h2>
            <p>Price: €500</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/Tokyo.jpeg" alt="Japan">
        <div class="grid-item-details">
            <h2>Japan</h2>
            <p>Price: €4000</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/Barcelona.jpeg" alt="Barcelona">
        <div class="grid-item-details">
            <h2>Barcelona</h2>
            <p>Price: €300</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/LA.jpeg" alt="Los Angeles">
        <div class="grid-item-details">
            <h2>Los Angeles</h2>
            <p>Price: €2000</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/NewYork.jpeg" alt="New York">
        <div class="grid-item-details">
            <h2>New York</h2>
            <p>Price: €3000</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/Amsterdam.jpeg" alt="Amsterdam">
        <div class="grid-item-details">
            <h2>Amsterdam</h2>
            <p>Price: €500</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/Whistler.jpeg" alt="Whistler">
        <div class="grid-item-details">
            <h2>Whistler</h2>
            <p>Price: €3000</p>
        </div>
    </div>
    <div class="grid-item">
        <img src="destinations/rio.jpeg" alt="Rio De Janeiro">
        <div class="grid-item-details">
            <h2>Rio De Janeiro</h2>
            <p>Price: €3500</p>
        </div>
    </div>
</div>


<br><br><br>

<?php
require "templates/footer.php";
?>





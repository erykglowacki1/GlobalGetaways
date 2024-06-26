<?php session_start();
if ($_SESSION['Active'] == false){
    header("location:login.php");
    exit;
}

?>
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
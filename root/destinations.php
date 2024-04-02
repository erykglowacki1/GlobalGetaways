
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

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/destinationPage.css">

    <title>Global Getaways</title>


</head>

<body>
<header>

    <div class="title-bar">
        <div class="global-getaways">
            <h1>Global Getaways</h1>
        </div>
        <div class="admin-button">
            <a href="adminLogin.php"><button>Admin Login</button></a>
        </div>
        <div class="login-button">
            <a href="login.php"><button>Login</button></a>
        </div>

    </div>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul class="nav-links">
            <li><i class="fa-solid fa-house"></i><a href="index.php">Home</a></li>
            <li><i class="fa-solid fa-location-dot"></i><a href="destinations.php">Destinations</a></li>
            <li><i class="fa-solid fa-phone"></i><a href="contact.php">Contact</a></li>

        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>

<h2>List of all of the destinations we offer</h2>
<?php if (!empty($success)) echo $success; ?>
<div class="container">
<table>
    <thead>
    <tr>
        <th>City</th>
        <th>Price</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["City"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </div>






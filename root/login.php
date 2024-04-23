<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Global Getaways</title>
</head>
<body>
<header>
    <div class="title-bar">
        <div class="global-getaways">
            <h1>Global Getaways</h1>
        </div>
    </div>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul class="nav-links">
            <li><i class="fa-solid fa-location-dot"></i><a href="destinations.php">Destinations</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>

<body>
<main>
    <div id="loginForm">
        <h2>Login</h2>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <button onclick="toggleForms()">Don't have an account? Click here to register</button>
    </div>
    <div class="admin-button">
        <a href="adminLogin.php"><button>Admin Login</button></a>
    </div>
    <div id="registerForm" style="display: none;">
        <h2>Register</h2>
        <form method="post">
            <input type="text" name="fullName" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="register" value="Register">
        </form>
        <button onclick="toggleForms()">Already have an account? Click here to login</button>
    </div>
</main>

<script>
    function toggleForms() {
        var loginForm = document.getElementById('loginForm');
        var registerForm = document.getElementById('registerForm');
        var isLoginVisible = loginForm.style.display === 'block';

        loginForm.style.display = isLoginVisible ? 'none' : 'block';
        registerForm.style.display = isLoginVisible ? 'block' : 'none';
    }
</script>
</body>
</html>

<?php
session_start();

require_once 'classes/User.php';
require "connection/connectionToDB.php";
$user = new User();

if (isset($_POST['register'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $user->setDetails($fullName, $email, $age, $password);

    if($user->emailExists($email)) {
        echo "Email already exists!";
    }
    else if($user->register()) {
        echo "Registration successful!";
    } else {
        echo "Registration failed!";
    }
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        echo "Login successful!";

        $_SESSION['user_id'] = $user->getId(); // Assuming getId() returns the user ID


        header('location:index.php');
    } else {
        echo "Invalid email or password.";
    }
}
?>
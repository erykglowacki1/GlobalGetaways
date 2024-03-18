<?php
session_start();

require_once 'classes/User.php';
$user = new User();

if (isset($_POST['register'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    if($user->emailExists($email)) {
        echo "Email already exists!";
    }
    else if($user->register($fullName, $email, $age, $password)) {
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

        header('Location: index.php');
    } else {
        echo "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="css/login.css">
</head>
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
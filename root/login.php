<?php
require "templates/header.php";
if (isset($_POST['register'])) {
    require "common.php";
    try {
        require_once 'connection/connectionToDB.php';


        $fullName = escape($_POST['fullName']);
        $email = filter_var(escape($_POST['email']), FILTER_VALIDATE_EMAIL);
        if (!$email) {
            throw new Exception("Invalid email format");
        }
        $age = escape($_POST['age']);
        $password = escape($_POST['password']);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $new_user = array(
            "fullName" => $fullName,
            "email" => $email,
            "age" => $age,
            "password" => $hashedPassword
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "Users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}



if (isset($_POST['register']) && isset($statement) && $statement) {
    echo htmlspecialchars($fullName) . ', you have been successfully registered.';
}

if(isset($_POST['login'])){

    require "common.php";
    try{
        require_once 'connection/connectionToDB.php';

        $username = escape($_POST['username']);
        $password = escape($_POST['password']);

        $sql = "SELECT * 
                FROM Users
                WHERE email = :email";

        $statement->bindParam(':email', $username, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);


        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['userID'] = $user['id'];
            $_SESSION['username'] = $user['fullName'];
            echo "Welcome, " . htmlspecialchars($user['fullName']) . "! You are now logged in.";

        } else {

            echo "Invalid username or password.";
        }
    } catch(PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>

<link rel="stylesheet" href="css/login.css">
<main>
    <div id="loginForm" style="display: block;>
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
    <button onclick="toggleForms()">Don't have an account? Click here to register</button>
    </div>

    <!-- Registration Form -->
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

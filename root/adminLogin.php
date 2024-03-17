<?php
require_once 'connection/connectionToDB.php';
require_once 'classes/adminAuthenticator.php';
require_once 'classes/Admin.php';
require_once 'classes/User.php';

session_start();

//check if form is submitted
if (isset($_POST['login'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    //instantiate the adminAuthenticator class
    $authenticator = new adminAuthenticator($connection);

    //call the authenticateUser method
    $user = $authenticator->authenticateUser($email, $password);

    //check if the user is an instance of the Admin class
    if ($user instanceof Admin) {
        // Admin login successful
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['access_level'] = $user->getAccessLevel();

        header("Location: adminFiles/admin.php");
        exit;
    } else {
        //admin login failed
        $loginErrorMessage = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h1>Admin Login Page</h1>

<?php
if (isset($loginErrorMessage)) {
    echo "<p>$loginErrorMessage</p>";
}
?>

<main>
    <div id="loginForm" style="display: block;">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</main>

</body>
</html>

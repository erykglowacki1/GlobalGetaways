<?php
require_once 'common.php';
require_once 'connection/connectionToDB.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['username'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT User.*, Admin.accessLevel 
                FROM User 
                INNER JOIN Admin ON User.id = Admin.User_id 
                WHERE User.Email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['Password']) {
            if ($user['accessLevel'] == 1) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['access_level'] = $user['accessLevel'];

                header("Location: adminFiles/admin.php");
                exit;
            } else {
                echo "You are not authorized to access the admin panel.";
            }
        } else {
            echo "Invalid username or password.";
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>


<h1>Admin Login Page</h1>
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
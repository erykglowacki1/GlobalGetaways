
<?php
require_once 'common.php';
require_once 'connection/connectionToDB.php';

if(isset($_POST['login'])){
    $username = $_POST['Email'];
    $password = $_POST['Password'];

    try {
        $sql = "SELECT * FROM User WHERE email = :email";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $username, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Assuming the user is an admin based on your criteria (e.g., access level)
            if ($user['accessLevel'] == 'admin') { // Assuming 'accessLevel' determines admin status
                echo "Welcome, " . htmlspecialchars($user['fullName']) . "! You are now logged in as an admin.";
            } else {
                echo "You are not authorized to access the admin panel.";
            }
        } else {
            echo "Invalid username or password.";
        }
    } catch(PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>




<h1>Admin Login Page</h1>
<main>
    <div id="loginForm" style="display: block;>
        <h2>Login</h2>
        <form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="login" value="Login">
    </form>

    </div>


</main>
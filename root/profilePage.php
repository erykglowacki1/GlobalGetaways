<?php
require_once "templates/header.php";
require_once "common.php";
require_once "connection/connectionToDB.php";
require_once "classes/User.php";
require_once "classes/Product.php";
require_once "classes/Payment.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user = new User($connection);
$userDetails = $user->getUserDetails($_SESSION['user_id']);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $user->changePassword($_SESSION['user_id'], $_POST['new_password']);
    // Redirect to the profile page with a query parameter to show a success message.
    header("Location: profilePage.php?password_changed=true");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<div class="UserProfile">
    <h1>User Profile</h1>
    <?php if(isset($_GET['password_changed'])): ?>
    <?php endif; ?>
    <div class="user-details">
        <h2>Details</h2>
        <p>Name: <?php echo htmlspecialchars($userDetails['FullName']); ?></p>
        <p>Email: <?php echo htmlspecialchars($userDetails['Email']); ?></p>
        <p>Age: <?php echo htmlspecialchars($userDetails['Age']); ?></p>
        <p>Password: ******** <a href="#" onclick="document.getElementById('passwordChangeForm').style.display='block'">Edit</a></p>

        <div id="passwordChangeForm" style="display:none;">
            <form method="POST" action="">
                <input type="password" name="new_password" required>
                <input type="submit" name="change_password" value="Change Password">
            </form>
        </div>
    </div>
</div>

</body>
</html>
<?php
require "templates/footer.php";
?>
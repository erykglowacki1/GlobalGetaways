<?php
require_once "templates/header.php";
require_once "common.php";
require_once "connection/connectionToDB.php";
require_once "classes/User.php";
require_once "classes/productManager.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

//fetch user details
$user = new User($connection);
$userDetails = $user->getUserDetails($_SESSION['user_id']);

//handles password change
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $user->changePassword($_SESSION['user_id'], $_POST['new_password']);
    //redirect to the profile page
    header("Location: profilePage.php");
    exit;
}

//fetch purchased products
$productManager = new ProductManager($connection);
$purchasedProducts = $productManager->fetchPurchasedProducts($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
    $productId = $_POST['product_id'];
    $sql = "DELETE FROM Payment WHERE Product_id = :productId AND User_id = :userId";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    header("Location: profilePage.php");
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
        <h2>Bookings</h2>
        <?php if (empty($purchasedProducts)): ?>
            <p>No bookings here.</p>
        <?php else: ?>
            <?php foreach ($purchasedProducts as $product): ?>
                <div class="booking-detail">
                    <p>Destination: <?php echo htmlspecialchars($product['City']); ?></p>
                    <p>Description: <?php echo htmlspecialchars($product['Description']); ?></p>
                    <p>Hotel: <?php echo htmlspecialchars($product['HotelName'] ?? 'None'); ?></p>
                    <p>Activity: <?php echo htmlspecialchars($product['Equipment'] ?? 'None'); ?></p>
                    <p>Price: €<?php echo htmlspecialchars(number_format($product['DestinationPrice'] + $product['ActivityPrice'] + $product['HotelPrice'], 2)); ?></p>
                    <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="submit" name="delete_product" value="Delete">
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
</html>
<?php
require "templates/footer.php";
?>
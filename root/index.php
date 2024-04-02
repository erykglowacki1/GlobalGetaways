<?php
require "templates/header.php";
require "common.php";
require_once 'connection/connectionToDB.php';
require "classes/Destination.php";

$result = [];
$error_message = "";

if (isset($_POST['search_submit'])) {
    $search_place = $_POST['search_place'];
    Destination::searchDestination($search_place, $result, $error_message);
}
?>


<head>
    <link rel="stylesheet" href="css/Results.css">
    <title>Search</title>

</head>
<h1>Status: You are logged in <?php echo
    $_SESSION['user_name'];  ?> :  </h1>
<body>
<h2 style="text-align: center;">Search for Destinations</h2>
<form class="search-bar" method="post">
    <label for="search-place">Place:</label>
    <input type="text" id="search-place" name="search_place" required>

    <label for="search-dates">Dates:</label>
    <input type="date" id="search-dates" name="search_dates" required>

    <label for="search-people">Number of People:</label>
    <select id="search-people" name="search_people" required>
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="search_submit" value="Search">
</form>

<?php if (!empty($result)): ?>
    <h2>Best Flight Found</h2>
    <table>
        <thead>
        <tr>
            <th>City</th>
            <th>Description</th>
            <th>Price</th>
            <th>Book</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo escape($row["City"]); ?></td>
                <td><?php echo escape($row["Description"]); ?></td>
                <td><?php echo escape($row["Price"]); ?></td>
                <td>

                    <form action="Auth.php" method="post">
                        <input type="hidden" name="City" value="<?php echo escape($row["City"]); ?>">
                        <input type="hidden" name="Description" value="<?php echo escape($row["Description"]); ?>">
                        <input type="hidden" name="Price" value="<?php echo escape($row["Price"]); ?>">
                        <input type="hidden" name="destination_id" value="<?php echo escape($row["id"]); ?>">
                        <input type="submit" name="book_submit" value="Book Here">

                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php elseif ($error_message): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>

</body>
</html>


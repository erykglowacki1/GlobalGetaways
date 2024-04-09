<?php
require "templates/header.php";
require "common.php";
require_once 'connection/connectionToDB.php';
require "classes/Destination.php";
require "classes/DestinationSearch.php";


$result = [];
$error_message = "";

if (isset($_POST['search_submit'])) {
    try {
        $search_place = $_POST['search_place'];
        $destinationSearch = new DestinationSearch($connection);
        $result = $destinationSearch->searchDestination($search_place);
        if ($result === null) {
            $error_message = "No results found for " . htmlspecialchars($search_place) . ".";
        } else {
            // getId() is the method to retrieve the ID of a destination
            $_SESSION['destination_id'] = $result[0]->getId();
        }
    } catch (Exception $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}
?>

<head>
    <link rel="stylesheet" href="css/Results.css">
    <title>Search</title>

</head>
<h1>Logged in <?php echo
    $_SESSION['user_name']; ?> : </h1>
<body>
<div class="search-form-container">
    <h2 style="text-align: center;">Search for Destinations</h2>
    <form class="search-bar" method="post">
        <div class="form-field">
            <label for="search-place">Place:</label>
            <input type="text" id="search-place" name="search_place" required>
        </div>

        <div class="form-field">
            <label for="search-dates">Dates:</label>
            <input type="date" id="search-dates" name="search_dates" required>
        </div>

        <div class="form-field">
            <label for="search-people">Number of People:</label>
            <select id="search-people" name="search_people" required>
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="submit-container">
            <input type="submit" name="search_submit" value="Search">
        </div>
    </form>
</div>


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
        <?php foreach ($result as $destination): ?>
            <tr>
                <td><?php echo escape($destination->getCity()); ?></td>
                <td><?php echo escape($destination->getDescription()); ?></td>
                <td><?php echo escape($destination->getPrice()); ?></td>
                <td>
                    <form action="Auth.php" method="post">
                        <input type="hidden" name="City" value="<?php echo escape($destination->getCity()); ?>">
                        <input type="hidden" name="Description"
                               value="<?php echo escape($destination->getDescription()); ?>">
                        <input type="hidden" name="Price" value="<?php echo escape($destination->getPrice()); ?>">
                        <input type="hidden" name="destination_id" value="<?php echo $_SESSION['destination_id']; ?>">
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


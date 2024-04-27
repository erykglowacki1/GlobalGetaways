<?php
require "templates/header.php";
require "common.php";
require_once 'connection/connectionToDB.php';
require "classes/Destination.php";
require "classes/DestinationSearch.php";


$result = [];
$error_message = "";

// Connect to database and fetch all destinations
try {
    $sql = "SELECT * FROM Destination";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $allDestinations = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all destinations
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

// Handling the search
if (isset($_POST['search_submit'])) {
    try {
        $search_place = $_POST['search_place'];
        $destinationSearch = new DestinationSearch($connection);
        $result = $destinationSearch->searchDestination($search_place);
        if ($result === null) {
            $error_message = "No results found for " . htmlspecialchars($search_place) . ".";
        } else {
            $_SESSION['destination_id'] = $result[0]->getId();
        }
    } catch (Exception $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}
?>


    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
<h1>Logged in as <?php echo $_SESSION['user_name']; ?> :</h1>
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
<div class="results-section">
    <h2>Best Flight Found</h2>
    <div class="results-table">
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
                            <input type="hidden" name="Price"
                                   value="<?php echo escape($destination->getPrice()); ?>">
                            <input type="hidden" name="destination_id"
                                   value="<?php echo $_SESSION['destination_id']; ?>">

                            <div class="submit-button2"><input type="submit" name="book_submit" value="Book Here">
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php elseif ($error_message): ?>
<div class="error-section">
    <p><?php echo $error_message; ?></p>
</div>
<?php endif; ?>
<h2 class="desth2">List of all of the destinations we offer</h2>
<div class="container">
    <table class="destinations-table">
        <thead>
        <tr class="table-header-row">
            <th class="header-city">City</th>
            <th class="header-price">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allDestinations as $row) : ?>
            <tr class="data-row">
                <td class="data-city"><?php echo htmlspecialchars($row["City"]); ?></td>
                <td class="data-price"><?php echo htmlspecialchars($row["Price"]); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
<?php
require "templates/footer.php";
?>
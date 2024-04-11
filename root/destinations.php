
<?php
try {
    require_once 'connection/connectionToDB.php';
    require "common.php";
    $sql = "SELECT * FROM Destination";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<?php
require "templates/header.php";
?>
<head>
    <link rel="stylesheet" href="css/destinationPage.css">
</head>
<h2 class="desth2">List of all of the destinations we offer</h2>
<?php if (!empty($success)) echo $success; ?>
<div class="container">
    <table class="destinations-table">
        <thead>
        <tr class="table-header-row">
            <th class="header-city">City</th>
            <th class="header-price">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr class="data-row">
                <td class="data-city"><?php echo escape($row["City"]); ?></td>
                <td class="data-price"><?php echo escape($row["Price"]); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<h2 class="gal">Gallery</h2>
<div class="image-grid">
    <div class="grid-item"><img src="destinations/London.jpeg" alt="Image 1"></div>
    <div class="grid-item"><img src="destinations/Albufeira.jpeg" alt="Image 2"></div>
    <div class="grid-item"><img src="destinations/Tokyo.jpeg" alt="Image 3"></div>
    <div class="grid-item"><img src="destinations/Split.jpeg" alt="Image 4"></div>
    <div class="grid-item"><img src="destinations/Whistler.jpeg" alt="Image 5"></div>
    <div class="grid-item"><img src="destinations/LA.jpeg" alt="Image 6"></div>
</div>



<?php
require "templates/footer.php";
?>





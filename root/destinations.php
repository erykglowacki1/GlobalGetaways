
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
<h2>List of all of the destinations we offer</h2>
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





<?php
require "templates/header.php";
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
<head>
    <link rel="stylesheet" href="css/destinationPage.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<h2>List of all of the destinations we offer</h2>
<?php if (!empty($success)) echo $success; ?>
<div class="container">
<table>
    <thead>
    <tr>
        <th>City</th>
        <th>Price</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["City"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </div>






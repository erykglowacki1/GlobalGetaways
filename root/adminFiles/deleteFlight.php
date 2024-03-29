<?php
/**
 * Delete a flight
 */
require "../common.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    try {
        require_once '../connection/connectionToDB.php';

        $sqlDeleteRef = "DELETE FROM Product WHERE Destination_id = :id";
        $statement = $connection->prepare($sqlDeleteRef);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $sql = "DELETE FROM Destination WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "Destination " . $id . " successfully deleted";
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

try {
    require_once '../connection/connectionToDB.php';
    $sql = "SELECT * FROM Destination";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<head>
    <link rel="stylesheet" href="../css/deleteDesign.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<h2>Delete Cities to fly to</h2>
<?php if (!empty($success)) echo $success; ?>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>City</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["City"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
            <td><?php echo escape($row["Description"]); ?></td>
            <td><a href="./deleteFlight.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="./admin.php">Back to home</a>




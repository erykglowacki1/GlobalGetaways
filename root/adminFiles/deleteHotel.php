<?php
/**
 * Delete a hotel
 */
require "../common.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    try {
        require_once '../connection/connectionToDB.php';

        $sqlDeleteRef = "DELETE FROM Product WHERE Hotel_id = :id";
        $statement = $connection->prepare($sqlDeleteRef);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $sql = "DELETE FROM Hotel WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "Hotel " . $id . " successfully deleted";
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

try {
    require_once '../connection/connectionToDB.php';
    $sql = "SELECT * FROM Hotel";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<head>
    <link rel="stylesheet" href="../css/deleteDesign.css">
</head>


<h2>Delete Hotels</h2>
<?php if (!empty($success)) echo $success; ?>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Hotel Name</th>
        <th>Num of Rooms</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["HotelName"]); ?></td>
            <td><?php echo escape($row["NumOfRooms"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
            <td><a href="deleteHotel.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="admin.php">Back to home</a>

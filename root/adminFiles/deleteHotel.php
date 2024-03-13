<?php
/**
 * Delete a hotel
 */
require "../common.php";
if (isset($_GET["id"])) {
    try {
        require_once '../connection/connectionToDB.php';
        $id = $_GET["id"];
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


<?php require "../templates/header.php"?>
<h2>Delete Activities</h2>
<?php if (!empty($success)) echo $success; ?> <!-- Check if $success is not empty -->
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Hotel Name</th>
        <th>Num of Rooms</th>
        <th>Price</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["HotelName"]); ?></td>
            <td><?php echo escape($row["NumOfRooms"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>

            <td><a href="deleteHotel.php?id=<?php echo escape($row["id"]);
                ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="admin.php">Back to home</a>
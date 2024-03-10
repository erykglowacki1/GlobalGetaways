<?php
/**
 * Delete a user
 */
require "../common.php";
if (isset($_GET["id"])) {
    try {
        require_once '../connection/connectionToDB.php';
        $id = $_GET["id"];
        $sql = "DELETE FROM Activity WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "Activity " . $id . " successfully deleted";
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
try {
    require_once '../connection/connectionToDB.php';
    $sql = "SELECT * FROM Activity";
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
        <th>Activity Type</th>
        <th>Price</th>


    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["Equipment"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>

            <td><a href="deleteActivity.php?id=<?php echo escape($row["id"]);
                ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="admin.php">Back to home</a>
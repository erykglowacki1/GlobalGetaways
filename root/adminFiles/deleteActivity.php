<?php
/**
 * Delete an activity
 */
require "../common.php";
if (isset($_GET["id"])) {
    try {
        $id = $_GET["id"];
        require_once '../connection/connectionToDB.php';

        $sqlDeleteRef = "DELETE FROM product WHERE Activity_id = :id";
        $statement = $connection->prepare($sqlDeleteRef);
        $statement->bindValue(':id', $id);
        $statement->execute();

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

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/deleteDesign.css">
</head>
<body>


<h2>Delete Activities</h2>
<?php if (!empty($success)) echo $success; ?>

<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Activity Type</th>
        <th>Price</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["Equipment"]); ?></td>
            <td><?php echo escape($row["Price"]); ?></td>
            <td><a href="./deleteActivity.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="./admin.php">Back to home</a>
</body>
</html>

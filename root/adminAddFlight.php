<?php
if (isset($_POST['submit'])) {
    require "common.php";
    try {
        require_once 'connection/connectionToDB.php';
        $new_user = array(
            "id" => null,
            "City" => escape($_POST['City']),
        );
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "Destination",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
require "templates/header.php";
if (isset($_POST['submit']) && $statement){
    echo $new_user['City']. ' successfully added';
}
?>
    <h2>Add a destination</h2>
    <form method="post">
        <label for="City">City</label>
        <input type="text" name="City" id="City">
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="index.php">Back to home</a>



<?php
if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../connection/connectionToDB.php';
        $new_user = array(
            "id" => null,
            "Equipment" => escape($_POST['Equipment']),
        );
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "Activity",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
require "../templates/header.php";
if (isset($_POST['submit']) && $statement){
    echo $new_user['Equipment']. ' successfully added';
}
?>
<head>
    <link rel="stylesheet" href="../css/addDesign.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<h2>Add an Activity</h2>
<form method="post">
    <label for="Equipment">Type of Trip being added</label>
    <input type="text" name="Equipment" id="Equipment">
    <input type="submit" name="submit" value="Submit">
</form>
<span class="returnToPage"><a href="admin.php">Back to main admin page</a></span>





<?php
require "templates/header.php";

if (isset($_POST['submit'])) {
    try {
        require "common.php";
        require_once 'connection/connectionToDB.php';
        $sql = "SELECT *
 FROM Destination
 WHERE City = :City";
        $City = $_POST['City'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':City', $City, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<main xmlns="http://www.w3.org/1999/html">
    <?php
    require "templates/slideshow.php"
    ?>


</main>
<?php
    if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) {
    ?>
    <h2>Results</h2>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>City</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["City"]); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    > No results found for <?php echo escape($_POST['City']); ?>.
<?php }
} ?>
    <h2>Find user based on location</h2>
    <form method="post">
        <label for="City">Location</label>
        <input type="text" id="City" name="City">
        <input type="submit" name="submit" value="View Results">
    </form>


</body>
</html>

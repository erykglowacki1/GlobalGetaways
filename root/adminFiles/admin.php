<?php
require "../templates/adminHeader.php";

?>

<h1>Admin Page</h1>
<head>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<table class="admin-table">
    <thead>
    <tr>
        <th>Links to modify the website</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <a href="adminAddDestination.php">Add new destinations</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="deleteFlight.php">Delete destinations</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="adminAddActivity.php">Add new activities</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="deleteActivity.php">Delete activities</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="adminAddHotel.php">Add new Hotel </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="deleteHotel.php">Delete Hotels</a>
        </td>
    </tr>
    </tbody>
</table>

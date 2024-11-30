<?php include('auth_admin.php'); ?>
<?php include "navigation.php"; ?>
<h1 style="display: flex; justify-content: center;">Rooms </h1>
<?php
include "dbconfig.php";

// Retrieve all rooms from the database
$query = "SELECT * FROM add_rooms";
$result = mysqli_query($connection, $query);
// Display a table with all the rooms and links to edit or delete each room
echo "<table>";
echo "<tr><th>ID</th><th>Type</th><th>Description</th><th>Image</th><th>Price</th><th>Facilities</th><th>Actions</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['room_id'] . "</td>";
    echo "<td>" . $row['room_type'] . "</td>";
    echo "<td>" . $row['room_description'] . "</td>";
    echo "<td><img src='" . $row['room_image_url'] . "' width='100'></td>";
    echo "<td>" . $row['room_price'] . "</td>";
    echo "<td>" . $row['room_facilities'] . "</td>";
    echo "<td><a style='background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;' href='urp_form.php?room_id=" . $row['room_id'] . "'>Edit</a> </td>";
    echo "</tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($connection);
?>
<link rel="stylesheet" href="admin.css">
<?php
// establish database connection
include  "dbconfig.php";
include "auth_admin.php";
include "navigation.php";
// get all feedbacks from database
$sql = "SELECT * FROM feedback";
$result = mysqli_query($connection, $sql);

// display feedbacks in table
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h1> Feedback Management</h1>";
echo "<table>";
echo "<tr><th>ID</th><th>Room ID</th><th>Rating</th><th>Comment</th><th>Submitted At</th><th>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['room_id'] . "</td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td>" . $row['comment'] . "</td>";
    echo "<td>" . $row['submitted_at'] . "</td>";
    echo "<td><a href='delete_feedback.php?id=" . $row['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

// close database connection
mysqli_close($connection);
?>
<link rel="stylesheet" href="admin.css">

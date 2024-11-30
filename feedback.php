<style>
/* Style for the search input */
input[type=text] {
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

/* Style for the search button */
button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

/* Style for the search button when hovered over */
button[type=submit]:hover {
  background-color: #45a049;
}


</style><?php
// establish database connection
include "dbconfig.php";
include "auth.php";
include "navigation.php";

// check if the search form has been submitted
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    // get feedbacks from database based on search term
    $sql = "SELECT feedback.room_id, feedback.rating, feedback.comment, add_rooms.room_type
            FROM feedback
            INNER JOIN add_rooms
            ON feedback.room_id = add_rooms.room_id
            WHERE add_rooms.room_type LIKE '%$searchTerm%'";
} else {
    // get all feedbacks from database
    $sql = "SELECT feedback.room_id, feedback.rating, feedback.comment, add_rooms.room_type
            FROM feedback
            INNER JOIN add_rooms
            ON feedback.room_id = add_rooms.room_id";
}

$result = mysqli_query($connection, $sql);

echo "<br>";
echo "<br>";
echo "<br>";

// display search form
echo '<form method="POST">';
echo '<input type="text" name="search" placeholder="Search by Room Type">';
echo '<button type="submit">Search</button>';
echo '</form>';

// display feedbacks in table
echo "<table>";
echo "<tr><th>Room Type</th><th>Rating</th><th>Comment</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['room_type'] . "</td>";
    echo "<td>" . $row['rating'] . " Star</td>";
    echo "<td>" . $row['comment'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// close database connection
mysqli_close($connection);
?>
<link rel="stylesheet" href="yb.css">
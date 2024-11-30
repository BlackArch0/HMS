<?php
// establish database connection
include "dbconfig.php";

// get feedback ID from URL parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $feedback_id = $_GET['id'];
    
    // delete feedback from database
    $sql = "DELETE FROM feedback WHERE id = '$feedback_id'";
    if (mysqli_query($connection, $sql)) {
        echo "Feedback deleted successfully.";
    } else {
        echo "Error deleting feedback: " . mysqli_error($connection);
    }
} else {
    echo "Invalid feedback ID.";
}

// close database connection
mysqli_close($connection);
?>

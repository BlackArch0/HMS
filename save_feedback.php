<?php
// Connect to the database
include "dbconfig.php";

// Get the feedback data
$room_id = $_POST['room_id'];
$feedback_rating = $_POST['feedback_rating'];
$feedback_comment = $_POST['feedback_comment'];

// Insert the feedback into the database
$stmt = $connection->prepare("INSERT INTO feedback (room_id, rating, comment) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $room_id, $feedback_rating, $feedback_comment);
$stmt->execute();
// Close the database connection
$stmt->close();
header("Location: feedback.php");
$connection->close();
?>

<?php include('auth.php'); ?>

<?php
include "dbconfig.php";
// Get form data
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$feedback = $_POST['feedback'];

// Insert data into database
$sql = "INSERT INTO feedback (customer_name, email, phone, feedback) VALUES ('$customer_name', '$email', '$phone', '$feedback')";

if ($connection->query($sql) === TRUE) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $connection->$error;
}

$connection->close();
?>
<?php include('auth.php'); ?>

<?php
session_start();
include 'dbconfig.php';

// Check if user is logged in as admin

// Check if room_id is set in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Delete room from database
    $sql = "DELETE FROM cart WHERE product_id = '$product_id'";
    $result = mysqli_query($connection, $sql);

    // Check if deletion was successful
    if ($result) {
        // Redirect to food rooms page
        header('Location: cart.php');
        exit();
    } else {
        echo "Error deleting room";
    }
} else {
    echo "Product ID not specified";
}
?>
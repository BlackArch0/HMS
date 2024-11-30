<?php include('auth_admin.php'); ?>
<?php
session_start();
include 'dbconfig.php';

// Check if user is logged in as admin

// Check if order_id is set in the URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Delete order from database
    $sql = "DELETE FROM order_items WHERE order_id = '$order_id'";
    $result = mysqli_query($connection, $sql);

    // Check if deletion was successful
    if ($result) {
        // Redirect to food orders page
        header('Location: food-admin.php');
        exit();
    } else {
        echo "Error deleting order";
    }
} else {
    echo "Order ID not specified";
}
?>
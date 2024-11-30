<?php include('auth.php'); ?>

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "Please login to access your cart.";
    header("Location: login.php");
    exit();
}

// Clear cart
unset($_SESSION['cart']);
$_SESSION['success'] = "Your cart has been cleared.";
header("Location: cart.php");
exit();
?>

<?php
session_start();

// If user clicks on logout button
if(isset($_POST['logout'])) {
    // Destroy session
    session_destroy();
    // Redirect to login page or home page
    header('Location: index.php');
    exit;
}
?>

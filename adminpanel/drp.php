<?php include('auth_admin.php'); ?>
<?php
include 'dbconfig.php';

// Check if user is logged in as admin

// Check if room_id is set in the URL
if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];

    // Delete room from database
    $sql = "DELETE FROM add_rooms WHERE room_id = '$room_id'";
    $result = mysqli_query($connection, $sql);

    // Check if deletion was successful
    if ($result) {
        // Redirect to food rooms page
        header('Location: admin-room.php');
        exit();
    } else {
        echo "Error deleting room";
    }
} else {
    echo "room ID not specified";
}
?>
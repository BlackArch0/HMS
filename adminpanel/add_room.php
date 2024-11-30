<?php include('auth_admin.php'); ?>
<?php include('navigation.php'); ?>
<?php
include "dbconfig.php";
    // retrieve room information from the form
    $room_type = $_POST['room_type'];
    $room_description = $_POST['room_description'];
    $room_image_url = $_POST['room_image_url'];
    $room_price = $_POST['room_price'];
    $room_facilities = $_POST['room_facilities'];
    $booking_quantity = $_POST['booking_quantity'];

    // insert the room information into the database
    $query = "INSERT INTO add_rooms (room_type, room_description, room_image_url, room_price, room_facilities, booking_quantity) 
              VALUES ('$room_type', '$room_description', '$room_image_url', '$room_price', '$room_facilities', '$booking_quantity')";
      if (mysqli_query($connection, $query)) {
        header('Location: room_ctrl.php');
      } else {
        echo "Error inserting record: " . mysqli_error($connection);
      }
?>

<?php 
include 'auth_admin.php';
include 'dbconfig.php';

$did = $_GET['id'];
$room_id = $_GET['room_id'];

$sql = "UPDATE add_rooms SET available = 1 WHERE room_id = {$room_id}";

$result = mysqli_query($connection, $sql) or die("Server Error");

header("Location: room_ctrl.php");
mysqli_close($connection);

exit();

?>

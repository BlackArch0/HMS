<?php include('auth_admin.php'); ?>
<?php 
$did = $_GET['id'];
include('security.php');


include("dbconfig.php");



$sql = "DELETE FROM food_items WHERE id = {$did};";
$sql .= "UPDATE id SET food_items = users - 1 WHERE users = {$did}";

if($result = mysqli_multi_query($connection, $sql)){  header("Location: food-order.php"); }  
else{ die("Server Error");}


mysqli_close($connection);
?>


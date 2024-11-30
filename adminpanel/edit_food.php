<?php include('auth_admin.php'); ?>
<?php
include 'dbconfig.php';

if (isset($_POST['food_id'])) {
  $food_id = $_POST['food_id'];
  $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
  $category = mysqli_real_escape_string($connection, $_POST['category']);
  $price = mysqli_real_escape_string($connection, $_POST['price']);
  $description = mysqli_real_escape_string($connection, $_POST['description']);
  
  $sql = "UPDATE food_items SET product_name='$product_name', category='$category', price='$price', description='$description' WHERE id='$food_id'";
  
  if (mysqli_query($connection, $sql)) {
    header('Location: food-admin.php');
  } else {
    echo "Error updating record: " . mysqli_error($connection);
  }
}
?>

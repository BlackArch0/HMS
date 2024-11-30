<?php include('auth_admin.php'); ?>
<?php include "dbconfig.php" ?>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = mysqli_query($connection, "SELECT * FROM food_items WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
} else {
  header("Location: food-admin.php");
}
?>
 <link rel="stylesheet" href="form.css">
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form method="POST" action="edit_food.php">
        <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="product_name" class="form-control" value="<?php echo $row['product_name']; ?>">
        </div>
        <div class="form-group">
          <label for="category">Category:</label>
          <input type="text" name="category" class="form-control" value="<?php echo $row['category']; ?>">
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea name="description" class="form-control"><?php echo $row['description']; ?></textarea>
        </div>
        <button style='background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;'  type="submit" name="edit_food" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>

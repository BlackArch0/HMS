<?php include('auth_admin.php'); ?>
<?php include "dbconfig.php" ?>
<link rel="stylesheet" href="form.css">
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2>Add New Food Item</h2>
      <form method="POST" action="insert_food.php">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="product_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="category">Category:</label>
          <input type="text" name="category" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" name="price" class="form-control">
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="image_url">Image URL:</label>
          <input type="text" name="image_url" value="Images/Food PNGs/Your_Food_Name.jpg"class="form-control">
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
    border-radius: 4px;' type="submit" name="add_food" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>

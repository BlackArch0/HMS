<?php include('auth_admin.php'); ?>
<?php include "navigation.php"  ?>


<link rel="stylesheet" href="./CSS/food.css">
<div class="container">
  <div class="row">
    <?php
      include 'dbconfig.php';
      $result = mysqli_query($connection, "SELECT * FROM food_items");
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-md-4">
      <div class="card">
        <img class="imgc" src="<?php echo $row['image_url']; ?>">
        <div class="info">
          <p class="sp"><?php echo $row['category']; ?></p>
          <h1><?php echo $row['product_name']; ?></h1>
          <p class="price">$<?php echo $row['price']; ?></p>
          <p class="d"><?php echo $row['description']; ?></p>
          <a style="background-color: #4CAF50;
border: none;
color: white;
padding: 8px 16px;
text-decoration: none;
display: inline-block;
font-size: 14px;
margin: 4px 2px;
cursor: pointer;
border-radius: 4px;" href="edit_food_form.php?id=<?php echo $row['id']; ?>">Edit</a>
          <a style="background-color: #4CAF50;
border: none;
color: white;
padding: 8px 16px;
text-decoration: none;
display: inline-block;
font-size: 14px;
margin: 4px 2px;
cursor: pointer;
border-radius: 4px;" href="delete_food.php?id=<?php echo $row['id']; ?>">Delete</a>
        </div>
      </div>
    </div>
    <?php
      }
    ?>
  </div>
</div>



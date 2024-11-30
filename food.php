<?php include('auth.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="./Images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" href="./CSS/nav.css">
  <link rel="stylesheet" href="./CSS/food.css">
  <link rel="stylesheet" href="./CSS/manage.css">


  <script src="angular.min.js"></script>
  <script src="angular-route.js"></script>

  <title>Hotel Managment System</title>
</head>

<body ng-app="myapp">
  
  <hr>
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="./Images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" href="./CSS/nav.css">
  <link rel="stylesheet" href="./CSS/food.css">
  <link rel="stylesheet" href="./CSS/manage.css">


  <script src="angular.min.js"></script>
  <script src="angular-route.js"></script>

  <title>Hotel Managment System</title>
</head>

<body ng-app="myapp">
  <br>
  <header style="position: fixed; top: 0; left: 0; right: 0; width: 100%; background-color: white; z-index: 1;">
  <nav class="navigation">
    <ul class="logo" href="#!home">
      <a href="home.php">
        <img src="./Images/logo.png" style="animation: hue-rotate 6s linear infinite; width: 64px; margin-top: -25px; height: 61px;">
      </a>
    </ul>
    <?php
    $host = "localhost";
    include("dbconfig.php");

 
   
    if (isset($_SESSION['username'])) {
      echo "<div class='dg'>";
      echo "<span style='font-family: Arial, sans-serif; padding: 8px;'>Hi, " . $_SESSION['username'] . "  </span>";
      echo "<form method='post' class='btn-form' action='logout.php'>
      <input type='submit' name='logout' value='Logout'> 
    </form>";
    echo "</div>";
    }
    ?>
    
    <ul class="m">
      <li id="ls"> <a class="nv" href="home.php">Home</a></li>
      <li id="ls"> <a class="nv" href="food.php">Food</a></li>
      <li id="ls"> <a class="nv" href="room.php">Room</a></li>
      <li id="ls">
      <a href="cart.php" class="nv">Cart</a></li>
      <li id="ls"> <a class="nv" href="feedback.php">Feedback</a></li>
    </ul>
  </nav>
</header>
</body>
</html>


<br>
<br><br><br>

<div class="container">
  <div class="row">
    <?php
      include 'dbconfig.php';
      $result = mysqli_query($connection, "SELECT * FROM food_items");
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-md-3">
      <form class="submisson" action="cart.php" method="POST">
        <div class="card">
          <img class="imgc" src="<?php echo $row['image_url']; ?>">
          <div class="info">
            <p class="sp"><?php echo $row['category']; ?></p>
            <h1><?php echo $row['product_name']; ?></h1>
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <p class="price"><?php echo $row['price']; ?>₹</p>
            <input type="text" class="qt" placeholder="Enter A Quantity" name="quantity" required>
            <p class="d"><?php echo $row['description']; ?></p>
            <input type="submit" name="add_to_cart" value="Add to Cart">

            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
          </div>
        </div>
      </form>
    </div>
    <?php
      }
    ?>
  </div>
</div>

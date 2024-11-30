
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
      <input type='submit' class='btn-form' name='logout' value='Logout'> 
    </form>";
    echo "</div>";
    }
    ?>
    
    <ul class="m">
      <li id="ls"> <a class="nv" href="home.php">Home</a></li>
      <li id="ls"> <a class="nv" href="food.php">Food</a></li>
      <li id="ls"> <a class="nv" href="room.php">Room</a></li>
      <li id="ls"> <a class="nv" href="feedback.php">Feedback</a></li>
    </ul>
  </nav>
</header>

  <hr>
 
</body>
</html>


  
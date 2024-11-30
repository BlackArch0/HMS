<?php
include('auth_admin.php');


?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <style>
    *{
        margin: 0;
        padding: 0;
    }
    form {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

input[type="submit"] {
  background-color: yellow;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
.center {
  display: flex;
  justify-content: center;
  align-items: center;
}

    </style>
<nav style="height: 46px;  width: 15%; background: red; z-index: 1;">
<form method="post" action="admin-logout.php" class="center">
  <input type="submit" name="logout" value="Logout">
</form>
<hr>
<br>
<br>
<div style="list-style: none;
    padding: 40px 676px;
    display: flex;
    width: 80%;
    justify-content: center;
    text-align: center;
    gap: 50px;
    background: yellow;
    flex-direction: row;">
<li> <a style="text-decoration: none;"href="room_ctrl.php"><img src="room-admin.png">Room Administration</a></li>
<li> <a style="text-decoration: none;"href="food-admin.php"> <img src="food-admin.png">Food Administration</a></li>
<li> <a style="text-decoration: none;"href="login_ctrl.php" target="_blank"><img src="login-admin.png">LogIn Administration</a></li>
<li> <a style="text-decoration: none;"href="feedbacks.php" target="_blank"><img style="height: 226px;"src="feedback.jpeg">feedbacks</a></li>
</div>



</nav>

<body background="bba.jpg">
    
<h1 style="margin-right: 300px; margin-top: -740px; float: right;"> </h1>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $hashed_password = ($password);

    include("dbconfig.php");


    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $error_message = "Username already exists. Please choose a different username.";
    } else {
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        if (mysqli_query($connection, $query)) {
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Error inserting user into database: " . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <title>Register User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    form {
        width: 300px;
        margin: 0 auto;
        padding: 120px;
        height: 500px;
        border: 1px solid red;
        border-radius: 5px;
        background-color: #fff;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 66px;
        margin-left: -16px;
        border: 1px solid red;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #3498DB;
        color: #fff;
        cursor: pointer;
    }
    
</style>
<body>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post">
    <center><h1 style="animation: hue-rotate 6s linear infinite;"><img style="height: 60px;" src="Images/logo.png"></h1></center>
        <label>Username:</label>
        <input type="text" name="username">
        <label>Password:</label>
        <input type="password" name="password">
        <label>Email:</label>
        <input type="email" name="email">
        <center><input type="submit" value="Sign Up"></center>
        <center style="margin-top: -40px;"><hr><span>Already have an account?</span> <a style="text-decoration: none;" onMouseOver="this.style.color='#0F0'"
   onMouseOut="this.style.color='#00F'"href="login.php">Log In</a></center><hr>
    </form>
</body>
</html>

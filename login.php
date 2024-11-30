<?php
session_start();
include("dbconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user is an admin
    if ($username === "admin" && $password === "Group_39") {
        $_SESSION['admin_logged_in'] = true;
        header('Location: ./adminpanel/admin_dashboard.php');
        exit();
    } else {
        // Check if user is a regular user
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <title>Login Page</title>
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
        <p>
            <?php echo $error_message; ?>
        </p>
    <?php } ?>

    <form method="post" action="#">
        <center>
            <h1 style="animation: hue-rotate 6s linear infinite;"><img style="height: 60px;" src="Images/logo.png"></h1>
        </center>
        <label>Username:</label>
        <input type="text" name="username"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <center><input type="submit" value="Log In">
            <a style="color: #f77100;text-decoration: none;" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='orange'" href="sdd.php">Forgot Password?</a><br><br><vr><hr>
                <span>Don't have an account?</span> <a style="text-decoration: none;" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" href="register.php">Sign up</a>
        </center>
        <hr>

    </form>
</body>

</html>

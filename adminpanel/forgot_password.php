<?php
session_start();
include("dbconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = $_POST['password'];

    // Verify the token
    $sql = "SELECT * FROM users WHERE reset_token='$token'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Update the

// user's password and clear the reset token
$row = mysqli_fetch_assoc($result);
$user_id = $row['id'];
$hash_password = ($password);
$sql = "UPDATE users SET password='$hash_password', reset_token=NULL WHERE id='$user_id'";
mysqli_query($connection, $sql);
    // Redirect to password_reset_success.php
    header('Location: password_reset_success.php');
    exit();
} else {
    $error_message = "Invalid or expired reset token";
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <title>Reset Password</title>
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
    <label>New Password:</label>
    <input type="password" name="password"><br><br>
    <label>Reset Token:</label>
    <input type="text" placeholder="copy&paste url after reset_token= " name="token"><br><br>
    <center><input type="submit" value="Reset Password"></center>
</form>
</body>
</html>
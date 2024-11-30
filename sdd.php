<?php
session_start();
include("dbconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a unique reset token
    $reset_token = bin2hex(random_bytes(32));

    // Store the reset token in the database for the user
    $sql = "UPDATE users SET reset_token='$reset_token' WHERE email='$email'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        // Send a password reset email to the user
        $reset_link = "http://localhost/HMS/adminpanel/forgot_password.php?email=$email&reset_token=$reset_token";
        $to = $email;
        $subject = "Password reset request for yourwebsite.com";
        $message = "Hi,\n\nYou recently requested a password reset for your account on yourwebsite.com. To reset your password, please click on the following link:\n\n$reset_link\n\nIf you did not request a password reset, please ignore this email.\n\nThanks,\nThe yourwebsite.com team";
        $headers = "From: yourwebsite@example.com";

        if (mail($to, $subject, $message, $headers)) {
            // Redirect the user to a page confirming that the password reset email was sent
            header('Location: password_reset_sent.php');
            exit();
        } else {
            $error_message = "An error occurred while trying to send the password reset email.";
        }
    } else {
        $error_message = "An error occurred while trying to store the password reset token in the database.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <title>Password Reset</title>
</head>

<body>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>

    <form method="post" action="#">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>

</html>

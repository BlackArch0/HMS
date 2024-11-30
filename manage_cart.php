<?php include('auth.php'); ?>
<?php
session_start();
include("dbconfig.php");

if (isset($_POST["add_to_cart"])) {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO cart (product_id, product_name, product_price, quantity) VALUES ('$product_id', '$product_name', '$product_price', '$quantity')";
    mysqli_query($conn, $sql);
}

header("Location: food.php");
exit();
?>

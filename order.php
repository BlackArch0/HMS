<?php include('auth.php'); ?>

<?php
session_start();
include("dbconfig.php");

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "Please login to view your cart.";
    header("Location: login.php");
    exit();
}

// Check if form was submitted and process the order if valid
if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $total_price = 0;

    // Get the order items from the cart
    $order_items = $_SESSION['cart'];
    foreach ($order_items as $item) {
        $total_price += $item['product_price'] * $item['quantity'];
    }

    // Insert the order into the database
    $query = "INSERT INTO order_ (user_id, name, address, contact, total_price) 
              VALUES ('$user_id', '$name', '$address', '$contact', '$total_price')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error: " . mysqli_error($connection));
    }

    // Get the ID of the order
    $order_id = mysqli_insert_id($connection);

    // Insert the order items into the database
    foreach ($order_items as $item) {
        $product_name = $item['product_name'];
        $quantity = $item['quantity'];
        $price = $item['product_price'];
        $query = "INSERT INTO order_items (order_id, product_name, quantity, price) 
                  VALUES ('$order_id', '$product_name', '$quantity', '$price')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Error: " . mysqli_error($connection));
        }
    }

    // Clear the cart and show the success message
    $_SESSION['cart'] = array();
    $_SESSION['success'] = "Your order has been placed successfully.";
    header("Location: food.php");
}

?>
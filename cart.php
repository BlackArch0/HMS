<?php include('auth.php'); ?>

<?php
// Check if form was submitted and add product to cart if valid
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][] = array(
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'quantity' => $quantity
    );
}

// Check if product should be removed from cart
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
    <style>

.body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40vh;
}

table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 20px;
}

table th, table td {
  border: 1px solid black;
  padding: 8px;
}

table th {
  background-color: #ccc;
  font-weight: bold;
}

table td:first-child {
  font-weight: bold;
}

        </style>
</head>

<body>
<h1>My Cart</h1>
<div class="body">
    <?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Cancel Order</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?php echo $item['product_id']; ?></td>
                    <td><?php echo $item['product_name']; ?></td>
                    <td><?php echo $item['product_price'] * $item['quantity']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                            <input type="submit" name="remove_from_cart" value="Remove">
                        </form>
                    </td>
                    
            </tr>
            <?php endforeach; ?>

        </table>

    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>
<center>
        <button><a href='fop.php' onclick="return confirm('Your Orders Will be There In 25 Minutes Proceed CheckOut And Payment')">Place Order</a></button>
            <button><a href='food.php'>Order More</a></button>
</center>
</body>
</html>

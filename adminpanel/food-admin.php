<?php include('auth_admin.php'); ?>
<?php

include 'dbconfig.php';
include 'navigation.php';

// Fetch orders and payments from database
$sql = "SELECT order_.order_id, order_.contact,order_.address ,order_.name, order_items.product_name, order_items.price, order_items.quantity
        FROM order_
        INNER JOIN order_items
        ON order_.order_id = order_items.order_id";

$result = mysqli_query($connection, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Food Orders</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Food Orders</h1><br>
    <a style='padding: 10px; background-color:aquamarine; text-decoration:none;' href="add_food.php">Add Food Items</a>
    <a style='padding: 10px; background-color:aquamarine; text-decoration:none;' href="payment-admin.php">Check Payments</a>
    <a style='padding: 10px; background-color:aquamarine; text-decoration:none;' href="food-order.php" target="_blank">Manage Food Items</a>
    <br>
    <br>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item Quantity</th>
            <th>Phone Number</th>
            <th>Customer Name</th>
            <th>Room Number</th>
            <th>Delete</th>
            <th>Invoice</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td class="anc"><a style="background-color: #4CAF50;
border: none;
color: white;
padding: 8px 16px;
text-decoration: none;
display: inline-block;
font-size: 14px;
margin: 4px 2px;
cursor: pointer;
border-radius: 4px;"class="anc" href="delete_order.php?order_id=<?php echo $row['order_id']; ?>">Delete</a></td>
                <td class="anc"><a style="background-color: #4CAF50;
border: none;
color: white;
padding: 8px 16px;
text-decoration: none;
display: inline-block;
font-size: 14px;
margin: 4px 2px;
cursor: pointer;
border-radius: 4px;"class="anc" href="invoice_f.php?id=<?php echo $row['order_id']; ?>" target="_blank">Invoice</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>



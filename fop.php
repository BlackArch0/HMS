<?php include('auth.php'); ?>

<?php 

include "dbconfig.php";
$total_price = 0;
// Check if the cart array is set and not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="form.css">
	<title>Order Form</title>
</head>
<body>
	<h1>Place Your Order</h1>
	<form method="POST" action="process_order.php">
		<label>Name:</label>
		<input type="text" name="name" required><br><br>
		<label>Room No:</label>
		<input type="text" name="address" placeholder="For E.G Room No.1"required><br><br>
		<label>Contact:</label>
		<input type="text" name="contact"placeholder="Your Phone Number" required><br><br>

		<h2>Order Items</h2>
		<table>
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Price Per</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					// Loop through the cart items and display them as rows in the table
					foreach ($_SESSION['cart'] as $item) {
						echo "<tr>";
						echo "<td>".$item['product_name']."</td>";
						echo "<td>".$item['quantity']."</td>";
						echo "<td>".$item['product_price']."</td>";
						echo "</tr>";
						$total_price += $item['product_price'] * $item['quantity'];
					}
				?>
			</tbody>
		</table>

		<p>Total Price: <?php echo $total_price; ?></p>

		<input type="submit" name="submit" value="Place Order">
	</form>
</body>
</html>
<?php
} else {
	// If the cart array is not set or empty, display an error message
	echo "Your cart is empty.";
}
?>

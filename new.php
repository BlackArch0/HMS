

<?php
include("dbconfig.php");


$sql = "SELECT * FROM rooms";
$result = $connection->query($sql);



if (isset($_POST["customer_name"])) {
	$room_id = $_POST["room_id"];
	$customer_name = $_POST["customer_name"];
	$room_type = $_POST["room_type"];
	$start_date = $_POST["start_date"];
	$end_date = $_POST["end_date"];
	$price = str_replace(',', '', $_POST["price"]);

	$sql = "INSERT INTO rooms (customer_name, room_type, start_date, end_date, price) VALUES ('$customer_name', '$room_type', '$start_date', '$end_date', '$price')";

	if ($connection->query($sql) === TRUE) {
		echo '<div class="success">
<div class="box">
<div class="header">
Your Room Has Been Booked Successfully 

<button style="background:red; padding: 10px;"class="Paylater">
Pay Later
</button>
<button style="background:red; padding: 10px;"class="PayNow">
Pay Now
</button>
<script>
    document.querySelector(".Paylater")
        .addEventListener("click", () => {
            window.location.href = "index.php ";
        });
		

    
    </script>
<script>
document.querySelector(".PayNow")
        .addEventListener("click", () => {
            window.location.href = "payment.php ";
        });
</script>
</div>
</div>
</div>
</div>';
}
	 else {
		echo "Error: " . $sql . "<br>" ,mysqli_error($connection);
	}
}

// Close the database connection
$connection->close();
?>
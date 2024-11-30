<?php
include("dbconfig.php");

if (isset($_POST["customer_name"])) {
	$room_id = $_POST["room_id"];
	$customer_name = $_POST["customer_name"];
	$room_type = $_POST["room_type"];
	$start_date = $_POST["start_date"];
	$end_date = $_POST["end_date"];
	$price = str_replace(',', '', $_POST["price"]);

	// Check if the selected room is available for the selected dates
	$check_query = "SELECT COUNT(*) as count FROM rooms WHERE room_type = '$room_type' AND ('$start_date' BETWEEN start_date AND end_date OR '$end_date' BETWEEN start_date AND end_date)";
	$check_result = mysqli_query($connection, $check_query);
	$check_row = mysqli_fetch_assoc($check_result);
	if ($check_row['count'] > 0) {
		echo '<div class="error">The selected room is not available for the selected dates. Please choose different dates or room.</div>';
	} else {
		$sql = "INSERT INTO rooms (customer_name, room_type, start_date, end_date, price) VALUES ('$customer_name', '$room_type', '$start_date', '$end_date', '$price')";

		if ($connection->query($sql) === TRUE) {
			// Update the add_rooms table to mark the booked room as unavailable
			$update_sql = "UPDATE add_rooms SET available = 0 WHERE room_id = $room_id";
			if ($connection->query($update_sql) === TRUE) {
				echo '<div class="main-box">';
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
				            window.location.href = "home.php ";
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
               
				// Send a booking confirmation email to the customer
				$recipientEmail = $_POST["customer_email"];
				$subject = 'Booking Confirmation';
				$message = "Dear $customer_name,\n\nThank you for booking a $room_type room with us. Your booking is confirmed from $start_date to $end_date, and the room price is $price per nights.\n\n Please let us know if you have any questions or concerns.\n\nBest regards,\nThe Hotel Team";
				$headers = 'From: hotel@example.com' . "\r\n" .
				    'Reply-To: hotel@example.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				if (mail($recipientEmail, $subject, $message, $headers)) {
				    echo '<div class="success">Booking confirmed, and email sent to ' . $recipientEmail . '</div>';
				} else {
				    echo '<div class="error">Booking confirmed, but email could not be sent to ' . $recipientEmail . '</div>';
    
}
echo '</div>';
			}}}		
    // ... more code here ...
}

// Close the database connection
$connection->close();
?>

<style>
.main-box {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.success {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #4CAF50;
  color: white;
  font-size: 24px;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
}

.success .header {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-bottom: 10px;
}

.success .header p {
  margin: 0;
}

.success .buttons {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

.success .buttons button {
  color: white;
  font-weight: bold;
  background-color: blue;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 10px;
  padding: 10px;
}

.success .buttons button:hover {
  opacity: 0.8;
}


</style>
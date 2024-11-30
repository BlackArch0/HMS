<?php include('auth.php'); ?>

<?php
# API URL
if (isset($_POST['submit'])) {
    $url = "https://magixapi.com/upi_payment_gateway/upipay.php";

    # Define the data
    $accountID = "MGX1262"; // Account ID
    $token = "MGX064cb626178e454c6fb31e6071be833aafc72da576823f2a455975f0af3166dd"; // API token
    $pay_id = "aq" . rand(99, 999); // Payment ID (Unique)
    $pay_name = $_POST['pay_name']; // Buyer name
    $pay_phone = $_POST['pay_phone']; // Buyer phone number (10 digits)
    $pay_amount = $_POST['pay_amount']; // Amount (1-100000)
    $payment_reason = $_POST['payment_reason'];
    # Put the data into an array
    $data = array(
        "accountID" => $accountID,
        "token" => $token,
        "pay_id" => $pay_id,
        "pay_name" => $pay_name,
        "pay_phone" => $pay_phone,
        "pay_amount" => $pay_amount,
        "payment_reason" => $payment_reason
    );

    # Initialiaze the curl
    $ch = curl_init($url);

    # Setup request to send json via POST.
    $payload = json_encode(array("pay_request" => $data));

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    # Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    # Send request.
    $result = curl_exec($ch);

    curl_close($ch);

    # Convert the json response into array
    $data_result = json_decode($result, true);

    # Retrive & store values of array into variables
    $api_query = $data_result['query'];
    $pay_link = $data_result['response']['pay_link'];
    $api_response_code = $data_result['response']['code'];
    $api_response_status = $data_result['response']['status'];

    if ($api_response_code == 200) {

        # Database Connection
        include "dbconfig.php";

        # Database Query
        $sql = "INSERT INTO payments (pay_id, payment_reason, pay_name, pay_phone, pay_amount)
                VALUES ('$pay_id', '$payment_reason','$pay_name', '$pay_phone', '$pay_amount')";

        if (mysqli_query($connection, $sql)) {
            header('Location: ' . $pay_link . '');
            die();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($connection);

    } else {
        echo "Payment Processing Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		
		form {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin: 50px auto;
			max-width: 500px;
			padding: 20px;
			width: 100%;
		}
		
		input[type="text"] {
			border: 2px solid #ccc;
			border-radius: 5px;
			display: block;
			font-size: 16px;
			margin-bottom: 10px;
			padding: 6px;
			width: 100%;
		}
		
		input[type="submit"] {
			background-color: #4CAF50;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px 20px;
			transition: background-color 0.3s ease;
		}
		
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<form action="#" method="post">
		<h1>Payment Form</h1>
		<input type="text" name="pay_name" placeholder="Enter Your Name">
		<input type="text" name="pay_phone" placeholder="Enter Your Phone number">
		<input type="text" name="pay_amount" placeholder="Enter Amount">
        <input type="text" name="payment_reason" placeholder="Food Order/Room Book">
		<input type="submit" name="submit">
	</form>
</body>
</html>

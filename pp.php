<?php include('auth.php'); ?>

<?php
# API URL
    $url="https://magixapi.com/upi_payment_gateway/upipay.php";

    # Define the data
    $accountID = "MGX1262";          // Account ID
    $token = "MGX064cb626178e454c6fb31e6071be833aafc72da576823f2a455975f0af3166dd";              // API token
    $pay_id = "aq".rand(99,999);             // Payment ID (Unique)
    $pay_name= "AR Shaikh";            // Buyer name
    $pay_phone = "9106775722";          // Buyer phone number (10 digits)
    $pay_amount = "69";         // Amount (1-100000)


    # Put the data into an array
      $data = array(
      "accountID" => $accountID,
      "token" => $token,
      "pay_id" => $pay_id,
      "pay_name"=> $pay_name,
      "pay_phone"=> $pay_phone,
      "pay_amount"=> $pay_amount
    );

    # Initialiaze the curl
    $ch = curl_init( $url );

    # Setup request to send json via POST.
    $payload = json_encode( array( "pay_request"=> $data ) );

    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

    # Send request.
    $result = curl_exec($ch);

    curl_close($ch);

    # Convert the json response into array
    $data_result = json_decode($result, true);
    
    echo "<pre>";
    print_r($data_result);


    # Retrive & store values of array into variables
    $api_query = $data_result['query'];
    $pay_link = $data_result['response']['pay_link'];
    $api_response_code = $data_result['response']['code'];
    $api_response_status = $data_result['response']['status'];

    if($api_response_code == 200){
        header('Location: '.$pay_link.'');
        die();
    }
    else{
        echo "Payment Proccessing Error";
    }
  ?>
Capture the response

  
    header("Content-Type:application/json");
    $data_api_resp = json_decode(file_get_contents('php://input'), true);

    if (empty($data_api_resp)) {
        # If empty response received from the API
    } else {

        $token = "";     // API token

        # If response received from API, retrive the values
        $accountID = $data_api_resp['api_response']['accountID'];
        $signature = $data_api_resp['api_response']['signature'];
        $pay_id = $data_api_resp['api_response']['pay_id'];
        $txn_id = $data_api_resp['api_response']['txn_id'];
        $pay_amount = $data_api_resp['api_response']['pay_amount'];
        $pay_utr = $data_api_resp['api_response']['pay_utr'];
        $pay_status = $data_api_resp['api_response']['pay_status'];

        # Compute the signature hash
        $signature_compute = md5($accountID . $token . $pay_id . $txn_id . $pay_status . $pay_amount . $pay_utr);

        # Match the signature hash
        if ($signature == $signature_compute) {
            # If signature match, process the transaction
        } else {
            # If signature don't match, ignore the payment
        }
    }
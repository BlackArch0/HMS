<?php
/*session_start();
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
    echo '<div class="success">
    <div class="box">
        <div class="header">
            Your Room Has Been Booked Successfully 

            <button style="background:red; padding: 10px;"class="ok">
                Pay Now
            </button>

            <script>
                document.querySelector(".ok")
                    .addEventListener("click", () => {
                        window.location.href = "payment.php";
                    });

            </script>

        </div>
    </div>
</div>';
} else {
echo "Error: " . $sql . "<br>" . $connection;
}*/

?>

<?php include('auth.php'); ?>

<?php
include("dbconfig.php");

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "Please login to view your cart.";
    header("Location: login.php");
    exit();
}

// Check if form was submitted and process the order if valid
if (isset($_POST['submit'])) {
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
    $query = "INSERT INTO order_ ( name, address, contact, total_price) 
              VALUES ('$name', '$address', '$contact', '$total_price')";
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




    // Link payment database and show payment form
    echo '<div class="main-box">';
    echo '<div class="success">
            <div class="header">
                <p>Your Order Has Been Placed Successfully</p>
                <div class="buttons">
                    <button class="ok">Pay Now</button>
                    <button class="k">Cash On Delivery</button>
                </div>
            </div>
            <p>Thank you for your order!</p>
          </div>
        </div>';
    
    // Redirect to payment page when Pay Now button is clicked
    echo '<script>
    // Add event listener to browser back button
    window.addEventListener("popstate", function(event) {
        // Prevent going back to the previous page
        window.history.pushState(null, document.title, window.location.href);
    });

    // Add event listener to Pay Now button
    document.querySelector(".ok").addEventListener("click", () => {
        // Do some strict action here, such as validating payment information
        // Then redirect to payment page
        window.location.href = "payment.php";
    });

    // Add event listener to Cash On Delivery button
    document.querySelector(".k").addEventListener("click", () => {
        // Do some strict action here, such as confirming the order with the user
        // Then redirect to food page
        window.location.href = "food.php";
    });
</script>
';

    // Redirect to food page when Cash On Delivery button is clicked
   

} else {
    echo "Error: Form not submitted.";
}
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

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

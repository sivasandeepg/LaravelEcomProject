<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel - Razorpay Payment Gateway Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="row g-4 text-center align-items-center justify-content-center pt-4">
    <button type="button" id="razorpay-button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
</div> 

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    $(document).ready(function() {
        $('#razorpay-button').click(function(e) {
            e.preventDefault();
            initiatePayment();
        });
        
        function initiatePayment() {
            // Your payment initiation logic here
            var options = {
                key: "rzp_test_S9VkSdttMmtWj8",
                amount: 1000, // Enter the amount to be charged
                currency: "INR",
                name: "Your Company Name",
                description: "Description of the purchase",
                image: "https://www.itsolutionstuff.com/frontTheme/images/logo.png",
                prefill: {
                    name: "sivasandeep",
                    email: "sivasandeep.dev@gmail.com"
                },
                theme: {
                    color: "#ff7529"
                },
                handler: function(response) {
                    // Handle successful payment response
                    console.log(response);
                    $('#payment-status').html('<div class="alert alert-success">Payment successful!</div>');
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        }
    });
</script> 

<!-- Element to display payment status -->
<div id="payment-status"></div>

</body>
</html>
  
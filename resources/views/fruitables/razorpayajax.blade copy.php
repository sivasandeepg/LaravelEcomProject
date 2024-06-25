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
                                <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary addToDelivery">Place Order</button>
                            </div> 

     
    <form id="razorpayForm">
    <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ env('RAZOR_KEY') }}"
            data-amount="1000"
            data-buttontext="Pay 10 INR"
            data-name="ItSolutionStuff.com"
            data-description="Rozerpay"
            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
            data-prefill.name="sivasandeep"
            data-prefill.email="sivasandeep.dev@gmail.com"
            data-theme.color="#ff7529">
    </script>
</form> 


<script>
    $(document).ready(function() {
        $('#razorpay-button').click(function(e) {
            e.preventDefault();
            initiatePayment();
        });
        
        function initiatePayment() {
            // Your payment initiation logic here
            // This function will be called when the button is clicked
            var form = $(this);
            var formData = new FormData(form[0]);

            // Make an AJAX request to your server to initiate the payment
            $.ajax({
                url: "{{ route('razorpay.payment.store') }}",
                type: "POST",
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {   
                    var options = {
                            key: response.key,
                            amount: response.amount,
                            currency: response.currency,
                            name: response.name,
                            description: response.description,
                            image: response.image,
                            prefill: {
                                name: response.prefill.name,
                                email: response.prefill.email
                            },
                            theme: {
                                color: response.theme.color
                            },
                            handler: function(response) {
                                // Handle successful payment response
                                console.log(response);
                                $('#payment-status').html('<div class="alert alert-success">Payment successful!</div>');
                            }
                        
                    };
                    var rzp = new Razorpay(options);
                    rzp.open();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    $('#payment-status').html('<div class="alert alert-danger">' + errorMessage + '</div>');
                }
            });
        }
    });
</script> 

  






 

<!-- 
    <script>
        $(document).ready(function() {
            $('#razorpay-button').click(function(e) {
                e.preventDefault();
                var form = $(this);
            var formData = new FormData(form[0]);
                $.ajax({
                    url: "{{ route('razorpay.payment.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: formData,
                processData: false,
                contentType: false,
                    success: function(response) {
                        var options = {
                            key: response.key,
                            amount: response.amount,
                            currency: response.currency,
                            name: response.name,
                            description: response.description,
                            image: response.image,
                            prefill: {
                                name: response.prefill.name,
                                email: response.prefill.email
                            },
                            theme: {
                                color: response.theme.color
                            },
                            handler: function(response) {
                                console.log(response);
                                $('#payment-status').html('<div class="alert alert-success">Payment successful!</div>');
                            }
                        };
                        var rzp = new Razorpay(options);
                        rzp.open();
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        $('#payment-status').html('<div class="alert alert-danger">' + errorMessage + '</div>');
                    }
                });
            });
        });
    </script> -->
</body>
</html>
 
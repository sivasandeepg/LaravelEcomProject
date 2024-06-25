<!DOCTYPE html>
<html lang="en">
  
@include('partials.head') 

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        @include('partials.navbar') 
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Checkout</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Checkout</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Billing details</h1>
                <form action="#">
                    <div class="row g-5">

                        <div class="col-md-12 col-lg-6 col-xl-7 product_data">  
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" value="{{ $useraddress->first_name ?? '' }}" id="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" value="{{$useraddress->last_name ?? '' }}" id="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Company Name<sup>*</sup></label>
                                <input type="text" id="company_name" value="{{$useraddress->company_name ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" id="address" value="{{$useraddress->address ?? '' }}" class="form-control" placeholder="House Number Street Name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" id="town_city" value="{{$useraddress->town_city ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" id="country" value="{{$useraddress->country ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" id="post_code" value="{{$useraddress->post_code ?? '' }}" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="tel" value="{{$useraddress->contact_mobile ?? '' }}" id="contact_mobile" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" value="{{$useraddress->email ?? '' }}" id="email" class="form-control">
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="Account-1" name="Accounts" value="Accounts">
                                <label class="form-check-label" for="Account-1">Create an account?</label>
                            </div>
                            <hr>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address">
                                <label class="form-check-label" for="Address-1">Ship to a different address?</label>
                            </div>
                            <div class="form-item">
                                <textarea name="text" id="order_note" class="form-control" spellcheck="false" cols="3" rows="4" placeholder="Oreder Notes (Optional)"></textarea>
                            </div>
                        </div>
  
                           <div id="hiddenForm" style="display: none;">
     
                        <div class="col-md-12 col-lg-6 col-xl-7 product_data">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" id="first_name_additional" value=""  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" id="lastname_additional" value=""  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Company Name<sup>*</sup></label>
                                <input type="text" id="company_name_additional" value=""  class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" id="address_additional" value=""  class="form-control" placeholder="House Number Street Name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" id="town_city_additional" value=""  class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" id="country_additional" value=""  class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" id="post_code_additional" value=""  class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="tel" id="contact_mobile_additional" value=""  class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" id="email_additional" value=""  class="form-control">
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox"  value="" class="form-check-input" id="Account-1" name="Accounts" value="Accounts">
                                <label class="form-check-label" for="Account-1">Create an account?</label>
                            </div>
                            <hr>

                            <div class="form-item"> 
                                <textarea name="text" class="form-control" spellcheck="false" cols="5" rows="2" placeholder="Oreder Notes (Optional)"></textarea>
                            </div>
                        </div>  
        
                     </div>

                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">  
                                <table class="table"  id="dataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
  
                               @foreach($cartitems as $items)
                                        <tr >
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{$items->image}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5 " >{{$items->product_name}}</td>
                                            <td class="py-5 ">{{$items->id}}</td>
                                            <td class="py-5" >{{$items->price_per_kg}}</td>
                                            <td class="py-5" >{{$items->quantity}}</td>
                                            <td class="py-5" >{{$items->total_price}}</td>

                                        </tr>
                                  @endforeach

                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-4">Shipping</p>
                                            </td>
                                            <td colspan="3" class="py-5">
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-1" name="shipping" value="free_shipping">
                                                    <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                                </div>
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-2" name="shipping" value="one_hour_shipping">
                                                    <label class="form-check-label" for="Shipping-2">Flat rate: $15.00</label>
                                                </div>
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-3" name="shipping" value="local_pickup">
                                                    <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark " id="grand_total" value="{{$grandtotal}}">{{$grandtotal}}</p>
                                               
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


<!-- ======================================= -->


<div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
    <div class="col-12">
        <div class="form-check text-start my-3">
            <input type="radio" class="form-check-input bg-primary border-0" id="Payments-1" name="payment_method" value="online">
            <label class="form-check-label" for="Payments-1">Pay Now</label> 
        </div>
    </div>
</div>

<div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
    <div class="col-12">
        <div class="form-check text-start my-3">
            <input type="radio" class="form-check-input bg-primary border-0" id="Delivery-1" name="payment_method" value="cashondelivery">
            <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
        </div>
    </div>
</div>

 
<!-- ======================================= --> 
<div class="row g-4 text-center align-items-center justify-content-center pt-4">
    <button type="button" id="razorpay-button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
</div>  
<!-- ======================================= -->  
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->


   
 <!-- Element to display payment status -->
<div id="payment-status"></div>

      
        
    <!-- JavaScript Libraries -->
    @include('partials.footer')  
    </body>

       
 

</html> 


     

    


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  
      
<script>
    $(document).ready(function() {
        $('#razorpay-buttons').click(function(e) {
            e.preventDefault(); 

            var payment_method = $("input[name='payment_method']:checked").val(); 

            if(payment_method=='online'){
                initiatePayment();
            } else {
                addToDelivery();
                    placeOrder(); 
            }
         
        });
        
        function initiatePayment() { 
            var grand_total = $('#grand_total').text();
            var user_email = $('#user_email').text();
            var user_name = $('#user_name').text();

            // Your payment initiation logic here
            var options = {   
                key: "rzp_test_S9VkSdttMmtWj8", 
                amount: 100*grand_total, // Enter the amount to be charged
                currency: "INR",
                name: "Your Company Name",
                description: "Description of the purchase",
                image: "https://www.itsolutionstuff.com/frontTheme/images/logo.png",
                prefill: {
                    name: 'sivasandeep',
                    email:'Sivasandeep.dev@gmail.com',
                },
                theme: {
                    color: "#ff7529"
                },
                handler: function(response) {
                    // Handle successful payment response
                    console.log(response);
                    // Send payment data to Laravel route
                    sendPaymentData(response);
                    addToDelivery();
                    placeOrder();
                }   

            };
   
            var rzp = new Razorpay(options);
            rzp.open();
        } 
        // close function
    
        
        function sendPaymentData(response) {
            // Send payment data to Laravel route via AJAX
            $.ajax({
                url: "{{ route('razorpay.payment.store') }}",
                type: 'POST',
                data: {
                    payment_id: response.razorpay_payment_id,
                    // Add any additional data you want to send
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // Handle success response from Laravel
                    console.log(data);
                    $('#payment-status').html('<div class="alert alert-success">Payment successful!</div>');
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    $('#payment-status').html('<div class="alert alert-danger">Payment failed!</div>');
                }
            });
        }
       // close function   
   
  




    function addToDelivery() {  

   // Get values from the main form
   var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var company_name = $('#company_name').val();
        var address = $('#address').val();
        var town_city = $('#town_city').val();
        var country = $('#country').val();
        var post_code = $('#post_code').val();
        var contact_mobile = $('#contact_mobile').val();
        var email = $('#email').val(); 

  
         
        
        // First AJAX request  
        $.ajax({
            type: 'POST',    
            url: '/add-delivery-details',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { 
                first_name: first_name,
                last_name: last_name,
                company_name: company_name,
                address: address,
                town_city: town_city,
                country: country, 
                post_code: post_code,
                contact_mobile: contact_mobile,
                email: email
            },
            success: function(response) {
                alert('Delivery details added successfully');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

         }
          // close function  


       
       function placeOrder(response) {  
        var order_note = $('#order_note').val(); 
        var grand_total = $('#grand_total').text();

        var shipping_options  = [];
        shipping_options = $("input[name='shipping']:checked").map(function() {
				return this.value;
			}).get().join(', ');

        var payment_method = $("input[name='payment_method']:checked").val(); 
    
         // Second AJAX request
        $.ajax({ 
            type: 'POST',    
            url: '/place_order',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { 
                payment_id: response.razorpay_payment_id,
                grand_total: grand_total,
                order_note:order_note,
                payment_method:payment_method,
                shipping_options:shipping_options,  
            },
            success: function(response) {
                alert('Checkout details added successfully');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

          }



    });
</script> 



       
     
 <!-- dynamic add address form  -->
<script> 
$(document).ready(function() {
    // Listen for checkbox change event
    $('#Address-1').change(function() {
        if ($(this).is(':checked')) {
            // Clone the template form elements and append them to the container
            var newForm = $('#hiddenForm').clone().removeAttr('id').show();
            $('.product_data').append(newForm);
        } else {
            // Remove the added form elements if the checkbox is unchecked
            $('.product_data').find('.additional-address').remove();
        }
    });

     
});
</script> 

  
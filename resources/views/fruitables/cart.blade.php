<!DOCTYPE html>
<html lang="en">
 
@include('partials.head') ;

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        @include('partials.navbar') ;
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
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->



       
  
 
 


        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>


     
                      <tbody id="cart_items_data">  </tbody> 
    
         

<!--  
    <tbody >
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="img/vegetable-item-2.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">Awesome Brocoli</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">2.99 $</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">2.99 $</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr> -->

 


                   </tbody>    
                        </tbody> 
                    </table>
                </div>
    

                <!-- coupon code -->
               <div class="mt-5">
                    <input id="coupon_code_input" type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button" onclick="applyCoupon()">Apply Coupon</button>
                   <!-- error message container -->
                   <span id="errorSpan" style="color: red; font-style: italic;"></span>
                   <span id="successSpan" style="color: green; font-style: italic;"></span>
                    
                </div>

        

    
              










                
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                         <div class="d-flex justify-content-between mb-4">
                          <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0" id="subtotal_value"> </p> 
                            </div>
                                <div class="d-flex justify-content-between border-bottom">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0"  id="delivery_charges"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between ">
                                    <h5 class="mb-0 me-4">Discount Total</h5> 
                                    <div class="">
                                        <p class="mb-0"  id="discount_amount_total"></p>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4" id="grandtotal_value"> </p>  
                            </div> 
                            <a href="{{ route('chackoutview') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Proceed Checkout</a>
    
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
    
            <!-- Delete Modal HTML -->
    <div id="deleteCartItemModal" class="modal fade deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Cart Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these records?</p>
                <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <input type="hidden" id="delete_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteCartItem()" >Delete</button>
            </div>
        </div>
    </div>
</div> 
          
         
    <!-- JavaScript Libraries -->
    @include('partials.footer')  
    </body>

</html>

   

<script> 


$(document).ready(function() {
    cartitemList();
    updateQuantity();
    deleteCartItem();
     
}); 
 
 

  
function cartitemList() {
    $.ajax({
        type: 'GET',
        url: "/fetchCartDataFromCart",
        dataType: 'json',
        success: function(response) {
            // Extracting data from the response
            var cartItems = response.cartitems;
            var subtotal = response.subtotal;
            var delivery_charges = response.delivery_charges;
            var discount_amount_total = response.discount_amount_total;
            var grandtotal = response.grandtotal;
            var userDetails = response.userdetails; 
            

            // Now you can use this data as per your requirement
            console.log("Cart Items:", cartItems);
            console.log("subtotal_update:", subtotal);
            console.log("Grand Total:", grandtotal);
            console.log("User Details:", userDetails);
            console.log("delivery_charges:", delivery_charges); 
            console.log("discount_amount_total:", discount_amount_total); 

            var tr = ''; // Initialize empty string for table rows

            // Example: Rendering cart items
            cartItems.forEach(function(item) {
                var id = item.id;
                var itemName = item.fruit.product_name;
                var itemPrice = item.fruit.price_per_kg;
                var itemQuantity = item.quantity;
                var totalPrice = item.total_price;
                var discount_amount = item.discount_amount;
                var imageUrl = item.fruit.image;
                var stockValidation = item.stock_validation; 

                // Construct table rows
                tr += '<tr>';
                tr += '<td><div class="d-flex align-items-center">' +
                    '<img src="' + imageUrl + '" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt=""></div></td>';
                tr += '<td><p class="mb-0 mt-4">' + itemName + '</p></td>';
                tr += '<td><p class="mb-0 mt-4">' + itemPrice + '</p></td>';


                tr += '<td><div class="input-group quantity mt-4" style="width: 100px;">';
                tr += '<div class="input-group-btn">';
                
                tr += '<button class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="adjustQuantity(this.parentNode.parentNode.querySelector(\'.quantity-input\'), -1)">';
                tr += '<i class="fa fa-minus" style="color: green;"></i>';
                tr += '</button>';

                tr += '</div>';
                tr += '<input type="text" class="form-control form-control-sm text-center border-0 quantity-input" value="' + itemQuantity + '" data-cart-item-id="' + id + '">';
                tr += '<div class="input-group-btn">';

                if (stockValidation > 0) {  

                tr += '<button class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="adjustQuantity(this.parentNode.parentNode.querySelector(\'.quantity-input\'), 1) ">';
                tr += '<i class="fa fa-plus" style="color: green;"></i>';
                tr += '</button>';
            } else {
                tr += '<button class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="adjustQuantity(this.parentNode.parentNode.querySelector(\'.quantity-input\'), 1) disabled ">';
                tr += '<i class="fa fa-plus" style="color: red;"></i>'; 
                tr += '</button>';
              }
                tr += '</div>';
                tr += '</div></td>';
               
               if( discount_amount != null){
                tr += '<td><p class="mb-0 mt-4 total-price">' + discount_amount + '</p></td>'; // Added a class 'total-price' to the td
              
               } else {
                tr += '<td> </td>'; // Added a class 'total-price' to the td
               }
                tr += '<td><p class="mb-0 mt-4 total-price">' + totalPrice + '</p></td>'; // Added a class 'total-price' to the td

               
                tr += '<td><a href="#deleteCartItemModal" data-toggle="modal" onclick="$(\'#delete_id\').val(\'' + id +  '\')" class="btn btn-md rounded-circle bg-light border mt-4"><i class="fa fa-times text-danger"></i></a></td>';
                tr += '</tr>';
            });

            $('.loading').hide();
            $('#cart_items_data').html(tr); // Append the constructed table rows to the table body
              // Update the Grand Total subtotal  and delry charges  in the HTML
              $('#subtotal_value').text(subtotal); 
              $('#grandtotal_value').text(grandtotal);  
              $('#delivery_charges').text(delivery_charges); 
              $('#discount_amount_total').text(discount_amount_total);

        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
}
 
       

 
function applyCoupon(response) {
    var couponCode = $('#coupon_code_input').val();
    var subtotal_value = $('#subtotal_value').val();
     
    // Send AJAX request to apply coupon
    $.ajax({
        type: 'POST',
        url: "/applyCouponOnCart", 
        data: {
            _token: '{{ csrf_token() }}', // Add CSRF token for Laravel protection
            couponcode: couponCode,
            subtotal:subtotal_value,
        }, 
        dataType: 'json',
        success: function(response) {
            // Handle success response
            cartitemList(); // Call cartitemList function after applying the coupon (assuming it updates the cart)
            console.log(response); // Log the response to the console   
            var successMessage = response.success;
            $('#successSpan').text(successMessage); 
            // Handle error appropriately, such as displaying an error message 
            setTimeout(function() {
                $('#successSpan').text('');
            }, 5000); // Adjust the delay as needed 
        },  

        error: function(xhr, status, error) {
        // Handle error response
        var errorMessage = xhr.responseJSON.error;
        console.error(errorMessage);
        $('#errorSpan').text(errorMessage);
         // Handle error appropriately, such as displaying an error message 
        setTimeout(function() {
            $('#errorSpan').text('');
        }, 5000); // Adjust the delay as needed

    }  
    });
}





function adjustQuantity(input, change) {
    var cartItemId = input.dataset.cartItemId;
    var value = parseInt(input.value, 10);
    var newValue = value + change;
    if (newValue < 1) {
        return; // Do not update quantity if it's less than 1
    }

    // Send AJAX request to update quantity
    $.ajax({
        type: 'POST',
        url: "{{ route('cart.updateCartItemQuantity') }}",
        data: {
            _token: '{{ csrf_token() }}', // Add CSRF token for Laravel protection
            cartItemId: cartItemId,
            newQuantity: newValue
        },
        success: function(response) {  

         cartitemList();
        
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error appropriately, such as displaying an error message
        }
    });
}
 
 
function updateTotalPrice(itemId) {
    $.ajax({
        type: 'GET',
        url: '/updateCartTotalPrice', // Replace with your server endpoint
        data: {
            itemId: itemId
        },
        success: function(response) {
            // Update total price in the UI
            var totalPriceElement = $('[data-cart-item-id="' + itemId + '"]');
            totalPriceElement.text('$' + response.totalPrice);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error appropriately, such as displaying an error message
        }
    });
} 

   
     
function deleteCartItem() {  
    var id = $('#delete_id').val();
    $('#deleteCartItemModal').modal('hide'); 
       
    $.ajax({
        type: 'GET',
        data: {
            id: id,
        },
        url: "/deletecartitem",
        success: function(response) { 
         
            cartitemList();
          
            // alert(response.message);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error appropriately, such as displaying an error message
        }
    });
}
 
  


    </script> 

      

 

 

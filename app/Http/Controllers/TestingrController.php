<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingrController extends Controller
{
    public function testing_code(Request $request){ 

$cart_item_Quantity =  $request->cart_item_Quantity;  // Quantity in cart
$couponQuantity =$request->couponQuantity;  // Minimum quantity for applying coupon
$product_item_price = $request->product_item_price;    // Price per item

// Calculate total cart item price  Rs  600
$total_item_Price = $product_item_price * $cart_item_Quantity;

// Initialize discount percentage
$discount_value= $request->discount_value;  // Initial discount percentage

// Calculate the multiplier to determine the increase in discount percentage
$multiplier = floor($cart_item_Quantity / $couponQuantity);

// Increase the discount percentage based on the multiplier
$discount_value *= $multiplier;


// Apply the discount to the total item price
// $discounted_price = $total_item_Price * (1 - ($discount_value / 100));
 $discounted_price = $total_item_Price - $discount_value;
  

// Output the discounted price
echo "Discounted value: " . number_format($discount_value);
echo "<hr>";
echo "total item Price: " . number_format($total_item_Price);
echo "<hr>";
echo "Discounted Price: " . number_format($discounted_price);
   



    }
}

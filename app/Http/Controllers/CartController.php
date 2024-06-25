<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cartmodel;
use App\Models\FruitsModel;
use App\Models\User;
use App\Models\UserDetailsModel;
use App\Models\SitesettingsModel;
use App\Models\OrdersModel;
use App\Models\OrderItemsModel;
use App\Models\CouponsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Services\DiscountService;
 
     
class CartController extends Controller
{ 

    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

     

    public function cartview()
    {      
     return view('fruitables.cart');
    }
 

    public function applyCoupon(Request $request)
    {
        $user_id =  session('user_id');  
        $couponcode = $request->input('couponcode');
        $subtotal = $request->input('subtotal');


        $check_coupon = CouponsModel::where('discount_code', $request->couponcode)->get();  
        $current_time = time();

        if(count($check_coupon) == 0){  
            return response()->json(['error' => ' InValid Coupon Code'], 422); 

        } else { 
          $coupon = CouponsModel::where('discount_code', $request->couponcode)->firstOrFail(); 
          $cartItem = Cartmodel::where(['product_id' => $coupon->offer_on_product_id, 'user_id'=> $user_id ] )->first();

        if($coupon->validity_start_date > $current_time){
            return response()->json(['error' => ' Offer valid starting from '. date('F jS, Y, \a\t g:i:s A',$current_time)], 422);
        }
        if($coupon->valid_till_date < $current_time){
            return response()->json(['error' => ' Validity expired'], 422); 
        }  
        if($coupon->quantity > $cartItem->quantity ){   
            return response()->json(['error' => ' Offer Not applicable. Add More Quantity'], 422);    
        } 
        }

      

        $cartItems = Cartmodel::with('fruit') ->where('user_id', $user_id) ->first();

        $total_product_price = $cartItems->fruit->price_per_kg * $cartItems->quantity;


     
     
 
        $discount_amount = 0; 
        if ($couponcode) {
            if ($coupon) {
                switch ($coupon->discount_type) {
                    case 'Flat':
                        $discount_amount = $total_product_price -= $coupon->value;
                        break;
                    case 'Percentage':
                        $discount_amount = ($total_product_price * $coupon->value) / 100;
                        break;
                    case 'Upto_Percentage':
                        $discount_amount = ($total_product_price * rand(0, $coupon->value)) / 100;
                        break;
                    case 'Upto_flat':
                        $discount_amount = $total_product_price -= rand(0, $coupon->value);
                        break;
                    default:
                        // This case handles scenarios where the discount_type is not recognized.
                        break;
                }
            }
        }
          
        // Update the quantity in the database
        Cartmodel::updateOrInsert(
            ['product_id' => $coupon->offer_on_product_id, 'user_id'=> $user_id],
            ['discount_amount' =>  $discount_amount]
            ); 

            return response()->json(['success' => 'Coupon code applied successfully'], 200); 
            
        
    }





    public function add_to_cart(Request $res){ 

        $user_id =  session('user_id');  

      $getqnty = Cartmodel::where(['product_id' => $res->product_id, 'user_id'=> $user_id ] )->first();
  
    if( $getqnty) {
      $updateqty =   $getqnty->quantity + $res->stock;
    } else {
        $updateqty =    $res->stock;
    }
   
        Cartmodel::updateOrInsert(
            ['product_id' => $res->product_id, 'user_id'=> $user_id],
            ['quantity' =>  $updateqty]
            ); 
     

        return response()->json(['message' => 'cart items added successfully']); 
    } 
 

           






    public function fetchCartDataFromCart(Request $request){
      $user_id = session('user_id');  

    // Fetch cart items along with associated fruits
    $cartItems = Cartmodel::with('fruit')
       ->where('user_id', $user_id)
        ->get();
    // Initialize subtotal outside the loop
    $subtotal = 0;
    $discount_amount_total= 0; 
    // Loop through each cart item
    foreach ($cartItems as $item) { 

        

        // Ensure the associated fruit exists
        if ($item->fruit) {
            // Modify the image attribute by appending the base URL
            $item->fruit->image = url('images/') . '/' . $item->fruit->image;
            $item->fruit->product_name = $item->fruit->fruit_name ;
            // Calculate total price for the item
           
            $discount_amount_total += (int)$item->discount_amount; 
            $item->total_price = ($item->fruit->price_per_kg * $item->quantity)- $discount_amount_total ;
            $item->stock_validation =  $item->fruit->stock - $item->quantity; 
           
            // Update subtotal
            $subtotal += $item->total_price;

       
        }
    }
    
    $delivery_charges = 10;   

    $grand_total = (int)$subtotal + (int)$delivery_charges - $discount_amount_total;

  
    // Prepare data to be passed to the view
       $cartItems = [
            'cartitems' => $cartItems,
            'subtotal' => $subtotal,
            'delivery_charges' => $delivery_charges,
            'discount_amount_total' => $discount_amount_total,
            'grandtotal' => $grand_total,
            'userdetails' => User::find($user_id),   
             
          ];  

        return response()->json($cartItems);
    }

   
   
    // public function fetchCartDataFromCart()
    // {
    //     $usermobile = session('usermobile'); 
    //     $userdetails = User::where('mobile',  $usermobile)->first();


    //     // Fetch cart data from the database
    //     $cartItems = Cartmodel::join('fruits', 'carts.product_id', '=', 'fruits.id')
    //     ->select('carts.*', 'fruits.fruit_name as product_name',  'fruits.price_per_kg', 'fruits.image')
    //     ->where('carts.user_id', $userdetails->id)  
    //     ->get();

    //       $subtotal = 0; // Move initialization outside the loop
    //       foreach ($cartItems as $item) {
    //       $item->image = url('images/') . '/' . $item->image;
    //       $item->total_price = $item->price_per_kg * $item->quantity;
    //       $subtotal += $item->total_price; 
    //     } 
    //     $user_id = session('user_id');  
    //     $cartItems = [
    //         'cartitems' => $cartItems,
    //         'subtotal' => $subtotal,
    //         'grandtotal' => 10 + $subtotal,
    //         'userdetails' => User::where('id',  $user_id)->first()   ];  

    //     return response()->json($cartItems);
          

    // }



    






    
        
    public function updateDiscount($Cart_data=null, $fruits_data=null, $coupon_data=null) 
    {  
        $discount_amount = 0;
    
        if ($coupon_data->coupon_type == 'repeated') { 
             
            $total_item_Price = $fruits_data->price_per_kg * $Cart_data->quantity;
            $coupon_discount_value = $coupon_data->value;
            $cart_item_Quantity =$Cart_data->quantity;
            $couponQuantity = $coupon_data->quantity;
           
         
              // Calculate the multiplier to determine the increase in discount percentage
               $multiplier = floor($cart_item_Quantity / $couponQuantity); 
             // Increase the discount percentage based on the multiplier
               $coupon_discount_value *= $multiplier;




    
            if ($coupon_data) {
                switch ($coupon_data->discount_type) {
                    case 'Flat':
                        $discount_amount = $coupon_discount_value;
                        break;
                    case 'Percentage':
                        $discount_amount = ($total_item_Price *$coupon_discount_value) / 100;
                        break;
                    case 'Upto_Percentage':
                        $discount_amount = ($total_item_Price * $coupon_discount_value) / 100;
                        break;
                    case 'Upto_flat':
                        $discount_amount = min($total_item_Price, $coupon_discount_value);
                        break;
                    default:
                        // This case handles scenarios where the discount_type is not recognized.
                        break;
                }
            }
            // Subtract discount from total price
            $total_item_Price -= $discount_amount;
        }
    
        // Return the discount amount
        return $discount_amount;
    }
     
       

     


 





//     public function updateCartItemQuantity(Request $request)
// {
//     $cartItemId = $request->input('cartItemId');
//     $cart_item_Quantity = $request->input('newQuantity');

//     $cartItem = Cartmodel::where('id', $cartItemId)->first();
    
      
  
//       if  (isset($cartItem->coupon_id) && !empty($cartItem->coupon_id) ) {

//         $Cart_data = Cartmodel::where('id', $cartItemId)->first();
//         $fruits_data = FruitsModel::where('id',$Cart_data->product_id)->first();
//         $coupon_data =  CouponsModel::where('id',$Cart_data->coupon_id)->first();



//         $discount_amount = 0; // Initialize discount amount
//         if ($coupon_data && $coupon_data->coupon_type == 'repeated') { 
             
//      // Call the calculateDiscount method of the DiscountService $discount_amount = $this->updateDiscount($cartItem, $fruits_data, $coupon_data);
//      //   $discountAmount = $this->discountService->calculateDiscount($Cart_data, $fruits_data, $coupon_data);
// //=======================================================

// $discount_amount = 0;
    
// if ($coupon_data->coupon_type == 'repeated') { 
     
//     $total_item_Price = $fruits_data->price_per_kg * $Cart_data->quantity;
//     $coupon_discount_value = $coupon_data->value;
//     $cart_item_Quantity =$Cart_data->quantity;
//     $couponQuantity = $coupon_data->quantity;
   
 
//       // Calculate the multiplier to determine the increase in discount percentage
//        $multiplier = floor($cart_item_Quantity / $couponQuantity); 
//      // Increase the discount percentage based on the multiplier
//        $coupon_discount_value *= $multiplier;





//     if ($coupon_data) {
//         switch ($coupon_data->discount_type) {
//             case 'Flat':
//                 $discount_amount = $coupon_discount_value;
//                 break;
//             case 'Percentage':
//                 $discount_amount = ($total_item_Price *$coupon_discount_value) / 100;
//                 break;
//             case 'Upto_Percentage':
//                 $discount_amount = ($total_item_Price * $coupon_discount_value) / 100;
//                 break;
//             case 'Upto_flat':
//                 $discount_amount = min($total_item_Price, $coupon_discount_value);
//                 break;
//             default:
//                 // This case handles scenarios where the discount_type is not recognized.
//                 break;
//         }
//     }
//     // Subtract discount from total price
//     $total_item_Price -= $discount_amount;
// }





// //============================================================================
//         } 
//     } 
      
// if(empty($cartItem->discount_amount)){
//     $discount_amount = 0;
// }   
//     // Update the quantity in the database
//     $cartItem = Cartmodel::find($cartItemId);
//     if ($cartItem) {
//         $cartItem->quantity = $cart_item_Quantity;
//         $cartItem->discount_amount = $discount_amount;  
//         $cartItem->save();
//         return response()->json(['success' => true]);
//     }

//     return response()->json(['success' => false, 'message' => 'Cart item not found']);
// }

  

// deleteCartItemQuantity 
public function deleteCartItem(Request $request)
{
    $cartItemId = $request->input('id');
   $itemIfDelete= Cartmodel::where('id',$cartItemId)->delete();
  if($itemIfDelete){
    return response()->json(['success' => true, 'message' => 'Cart item Deleted']);
  }
   
}


   

public function updateTotalPrice(Request $request)
{
    $user_id = session('user_id'); 



    // Fetch cart data from the database
    $cartItems = Cartmodel::join('fruits', 'carts.product_id', '=', 'fruits.id')
    ->select('carts.*', 'fruits.fruit_name as product_name',  'fruits.price_per_kg', 'fruits.image')
    ->where('carts.id', $request->itemId)   
    ->get(); 

      $subtotal = 0; // Move initialization outside the loop
      foreach ($cartItems as $item) {
      $item->total_price = $item->price_per_kg * $item->quantity;
  
    } 
    return response()->json($cartItems);
}




public function updateCartItemQuantity(Request $request)
{
    $cartItemId = $request->input('cartItemId');
    $newQuantity = $request->input('newQuantity');

    $cartItem = Cartmodel::find($cartItemId);

    if (!$cartItem) {
        return response()->json(['success' => false, 'message' => 'Cart item not found']);
    }

    $discountAmount = 0;

    if ($cartItem->coupon_id) {
        $fruitsData = FruitsModel::find($cartItem->product_id);
        $couponData = CouponsModel::find($cartItem->coupon_id);

        if ($couponData && $couponData->coupon_type == 'repeated') {
            $discountAmount = $this->calculateDiscount($cartItem, $fruitsData, $couponData);
        }
    }

    $cartItem->quantity = $newQuantity;
    $cartItem->discount_amount = $discountAmount;
    $cartItem->save();

    return response()->json(['success' => true]);
}

private function calculateDiscount($cartItem, $fruitsData, $couponData)
{
    $totalItemPrice = $fruitsData->price_per_kg * $cartItem->quantity;
    $couponDiscountValue = $couponData->value;
    $cartItemQuantity = $cartItem->quantity;
    $couponQuantity = $couponData->quantity;

    $multiplier = floor($cartItemQuantity / $couponQuantity);
    $couponDiscountValue *= $multiplier;

    switch ($couponData->discount_type) {
        case 'Flat':
            return $couponDiscountValue;
        case 'Percentage':
            return ($totalItemPrice * $couponDiscountValue) / 100;
        case 'Upto_Percentage':
            return ($totalItemPrice * $couponDiscountValue) / 100;
        case 'Upto_flat':
            return min($totalItemPrice, $couponDiscountValue);
        default:
            return 0;
    }
}
  









} 
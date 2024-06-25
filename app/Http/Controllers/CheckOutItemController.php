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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class CheckOutItemController extends Controller
{
    
    
    public function chackoutview() { 
         
        $user_id = session('user_id');  
           
        $cartitems = Cartmodel::join('fruits', 'carts.product_id', '=', 'fruits.id')
            ->select('carts.*', 'fruits.fruit_name as product_name',  'fruits.price_per_kg', 'fruits.image')
            ->get();
        $subtotal = 0; // Move initialization outside the loop
        foreach ($cartitems as $item) {
            $item->image = url('images/').'/'.$item->image; 
            $item->total_price = $item->price_per_kg * $item->quantity;
            $subtotal += $item->total_price; // Accumulate subtotal here
        }   
     
        $dedelivery_charge = 0; 
        //Calculate grand total
        $grandtotal = $subtotal + $dedelivery_charge;  
  
            // $usermobile = session('usermobile');
            $userdetails = User::where('id',  $user_id)->first();  
            $useraddress = UserDetailsModel::where('user_id',  $user_id)->first(); 
               
        return view('fruitables.chackout', compact('cartitems','userdetails','subtotal', 'grandtotal','useraddress'));
    } 
    
            
     
      
    public function place_order(Request $request){ 
         
        $usermobile = session('usermobile');
        $userdetails = User::where('mobile',  $usermobile)->first();


        if($request->payment_method == 'online'){ 


            $payment_status =  'successfully';
        }else { 
            $payment_status =  'pending';
        }

        $order_details = OrdersModel::updateOrInsert(
               
            [ 
             'payment_id' => $request->payment_id,
             'grand_total' =>  $request->grand_total,
             'order_note'=> $request->order_note,
             'orders_status'=> 'successfully',
             'payment_status'=> $payment_status,
             'shipping_options' => $request->shipping_options,
             'payment_method' => $request->payment_method, 
             ]
        );
        
        
        $orderDetails = OrdersModel::where('user_id', $userdetails->id)
        ->latest() // Orders by latest created_at or updated_at
        ->first(); 
    
        if ($orderDetails !== false) {
            $lastInsertedId = $orderDetails->id; 

            $cartitems = Cartmodel::join('fruits', 'carts.product_id', '=', 'fruits.id')
            ->select('carts.*', 'fruits.fruit_name as product_name',  'fruits.price_per_kg', 'fruits.image')
            ->where('carts.user_id', $userdetails->id) 
            ->get();
            $subtotal = 0; // Move initialization outside the loop
            foreach ($cartitems as $item) {
            $item->image = url('images/').'/'.$item->image; 
            $item->total_price = $item->price_per_kg * $item->quantity;
            $subtotal += $item->total_price; // Accumulate subtotal here 

  
       
            OrderItemsModel::updateOrInsert(
                ['order_id'=>  $lastInsertedId, 'user_id'=> $userdetails->id ,'product_id' =>   $item->product_id],
                [ 'quantity'=>  $item->quantity,'price'=>$item->price_per_kg ]
            ); 

            
                 // update product stock after sale item 
                 FruitsModel::updateOrInsert(
                    ['id'=>   $item->product_id],
                    ['stock' =>   $item->quantity ]
                );

             }  





        

  
              
     

        
            return response()->json(['message' => 'items added successfully']); 
        } else {
            return response()->json(['message' => 'items added  not successfully']); 
        }

} 
 



}

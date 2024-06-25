<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\TransactionsModel;

class RazorpayController extends Controller
{ 
     
    public function razorpay(): View
    {        
        return view('fruitables.razorpay');
    }  
         
    public function razorpayajax(): View
    {        
        return view('fruitables.razorpayajax');
    } 
 


      

    public function store(Request $request): RedirectResponse
    {   
        $user_id = session('user_id');  
        $input = $request->all();  
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        if(count($input) && !empty($input['payment_id'])) {
            try {
                $payment = $api->payment->fetch($input['payment_id']);
     
                $response = $api->payment->fetch($input['payment_id'])->capture(array('amount'=>$payment['amount'])); 
      
                 
                $transaction = new TransactionsModel();
                $transaction->payment_id = $payment->id;
                $transaction->user_id = $user_id; // Assuming you have the user_id
                $transaction->payment_stats = $payment->status;
                $transaction->amount =  $payment->amount/100;
                $transaction->currency = $payment->currency;
           
                $transaction->save();      


            } catch (Exception $e) {
                // Log the error or handle it accordingly
                \Log::error($e->getMessage());
                Session::put('error', 'Payment failed');
                return redirect()->back()->with('error', 'Payment failed');
            }
        }
           
        Session::put('success', 'Payment successful');
        return redirect()->back()->with('success', 'Payment successful');
    }  


    
    // public function store(Request $request): RedirectResponse
    // {   
        
    //     $user_id = session('user_id');  
    //     $input = $request->all();  
    //     $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
    //     $payment = $api->payment->fetch($input['payment_id']);
      
  
    //     if(count($input)  && !empty($input['payment_id'])) {
    //         try {
    //             $response = $api->payment->fetch($input['payment_id'])->capture(array('amount'=>$payment['amount'])); 
      
            
    //             TransactionsModel::updateOrInsert(
    //                 ['payment_id' => $input['payment_id'], 'user_id'=> $user_id],
    //                 ['payment_stats' =>  $response->status, 'razorpay_response'=>$response]
    //                 ); 
  
 

    //         } catch (Exception $e) {
    //             return  $e->getMessage();
    //             Session::put('error',$e->getMessage());
    //             return redirect()->back();
    //         }
    //     }
           
    //     Session::put('success', 'Payment successful');
    //     return redirect()->back();
    // } 
}
 
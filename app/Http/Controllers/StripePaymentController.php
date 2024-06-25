<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Stripe;

class StripePaymentController extends Controller
{

    
    public function checkout()
    {
        return view('fruitables.checkout');
    }



    
    public function session()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'inr',
                        'product_data' => [
                            'name' => 'Sivasandeep',
                        ],
                        'unit_amount'  => 50,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Yay, It works!!!";
    }


 




  

    public function stripe()
    {
        return view('fruitables.stripe');
    }
   



    





}


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GoogleController; 
use App\Http\Controllers\WebViewController; 
use App\Http\Controllers\AdminviewController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\FirebaseloginrController;  
use App\Http\Controllers\CheckOutItemController;  
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\TestingrController;
use App\Http\Middleware\FirebasePhoneAuthMiddleware; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/
  
        Route::get('/', function () {
            return view('welcome');
        });
    

              
       // auth website
       Route::any('/firebase_google_login',[UsersController::class,'firebase_google_login_view'])->name('firebase_google_login');
    
       //update iser details
       Route::any('/add-delivery-details',[UsersController::class,'add_delivery_details'])->name('cart.add_delivery_details'); 
       
       //for testing
       //Route::any('/firebase_login',[UsersController::class,'firebase_login_view']); // for testing 
       
       // gmail login
       Route::any('/auth/gmail',[UsersController::class,'redirectToGmail'])->name('gmail.login'); 
       Route::any('/auth/gmail/callback',[UsersController::class,'handleGmailCallback']);
    
       //save login data for firebase 
       Route::any('firebasesave',[FirebaseloginrController::class,'firebase_login']);     





     
   
           // Apply the 'firebase' middleware group to these routes
        //   Route::middleware(['firebase'])->group(function () {
    
    // website homepage 
    // Route::any('/home',[WebViewController::class,'index'])->name('home')->middleware("auth.firebase"); 
     
     // Route for home page with auth.user middleware applied
     Route::middleware('auth.user')->get('/home', [WebViewController::class, 'index'])->name('home')->middleware("auth.firebase"); 
    
    //website pages 
    Route::any('/shoping',[WebViewController::class,'shop'])->name('products.shop');
    Route::any('/shopingdetails',[WebViewController::class,'shopdetail'])->name('products.shopdetail'); 
    
    //fetchproductWithCategoriesList
    Route::any('/fetchproductWithCategoriesList',[WebViewController::class,'productWithCategoriesList'])->name('products.fetchproductWithCategoriesList'); 


    //cart Controller
    Route::any('/cartview',[CartController::class,'cartview'])->name('cartview');  
    Route::any('/add-to-cart',[CartController::class,'add_to_cart'])->name('cart.addtocart'); 
    //fetchCartDataFromCart
    Route::any('/fetchCartDataFromCart',[CartController::class,'fetchCartDataFromCart'])->name('cart.fetchCartDataFromCart');  
    Route::any('/applyCouponOnCart',[CartController::class,'applyCoupon'])->name('cart.applyCouponOnCart');    


    Route::any('/updateCartItemQuantity',[CartController::class,'updateCartItemQuantity'])->name('cart.updateCartItemQuantity'); 
    Route::any('/deletecartitem',[CartController::class,'deleteCartItem'])->name('cart.deleteCartItem'); 
    Route::any('/updateCartTotalPrice',[CartController::class,'updateTotalPrice'])->name('cart.updateTotalPrice'); 
    
    //CheckOutItemController
    Route::any('/place_order',[CheckOutItemController::class,'place_order']);
    Route::any('/chackoutview',[CheckOutItemController::class,'chackoutview'])->name('chackoutview'); 


//RazorpayController 
Route::get('/razorpay', [RazorpayController::class, 'razorpay']);
Route::get('/razorpayajax', [RazorpayController::class, 'razorpayajax']);
Route::post('/razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');

// strip     
Route::any('/checkout',[StripePaymentController::class,'checkout'])->name('checkout');
Route::any('/session',[StripePaymentController::class,'session'])->name('session');
Route::any('/success',[StripePaymentController::class,'success'])->name('success');

     //StripePaymentController
   // Route::any('/chackoutview',[StripePaymentController::class,'chackoutview'])->name('chackoutview'); 
   Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
    

// });




    
   // TestingrController    
    Route::any('/test',[TestingrController::class,'testing_code']); 


    

     
    //admin panel 
    Route::any('/adminlogin',[AdminviewController::class,'viewadminlogin'])->name('adminlogin');  
    Route::any('/adminregistration',[AdminviewController::class,'viewregistration']);  
    Route::any('auth/authadminlogin',[AdminviewController::class,'adminlogin']);  
    Route::any('/authadminregistration',[AdminviewController::class,'registration']);  


    // check login or not middleware  
    Route::middleware('auth')->group(function () {
 
    Route::any('/adminindex',[AdminviewController::class,'adminhome'])->name('adminindex')->middleware('AdminMiddleWare');  
    Route::any('/viewfruits',[AdminviewController::class,'viewfruits'])->name('adminproducts.viewfruits'); 
    Route::any('/form_elements',[AdminviewController::class,'form_elements'])->name('adminproducts.form_elements'); 
    Route::any('/signout',[AdminviewController::class,'signout'])->name('signout');  
      
    });













Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

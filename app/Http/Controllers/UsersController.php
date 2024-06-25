<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Socialite;   
 use Laravel\Socialite\Facades\Socialite;
 use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
 use App\Models\User;
 use App\Models\UserDetailsModel;

class UsersController extends Controller
{
       
    public function firebase_login_view(){
       return view('auth.firebaselogin');
    }
    
    public function firebase_google_login_view(){
        return view('auth.googlelogin');
     }  
 
      
 

  
    public function redirectToGmail()
{
    return Socialite::driver('gmail')->redirect();
}
 
public function handleGmailCallback()
{
    $user = Socialite::driver('gmail')->user();
    // Your authentication logic here
} 
 
    
public function add_delivery_details(Request $request){ 


    $usermobile = session('usermobile');
    $userdetails = User::where('mobile',  $usermobile)->first();
     
    UserDetailsModel::updateOrInsert(  

        ['user_id'=> $userdetails->id], // Condition to find existing record
        [
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'company_name'   => $request->company_name,
            'address'        => $request->address,
            'town_city'      => $request->town_city,
            'country'        => $request->country,
            'post_code'      => $request->post_code,
            'contact_mobile' => $request->contact_mobile,
            'email'          => $request->email,
 
        ]
         // Data to be updated or inserted
    );
      

}


}

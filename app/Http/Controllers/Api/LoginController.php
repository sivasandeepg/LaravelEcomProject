<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use Kreait\Firebase\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

   
class LoginController extends Controller
{ 
       
        
    public function firebase_login(Request $request){
           
        User::updateOrInsert(
            ['mobile' => $request->mobile ],
            ['otp' =>  $request->otp]
            ); 
                 
            $mobile =  $request->mobile;  
            $user =  User::where("mobile", $mobile)->first();
            $userId = $user->id;
       
            Auth::loginUsingId($userId); 


            session(['user_id' =>  $userId]);  
            session(['usermobile' =>  $mobile]);  
            return redirect()->route('home'); 
     //   return response()->json(['message' => 'Fruit added successfully']); 
           
    }
          
                 
    public function setsen(Request $request){
         
        session(['usermobile' => '9966342023']); 
        return response()->json(['message' => 'set session 9966342023 api']); 
            
    } 
   
 


}

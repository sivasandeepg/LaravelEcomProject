<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Kreait\Firebase\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
 
class FirebaseloginrController extends Controller
{
    public function firebase_login(Request $request){ 

    User::updateOrInsert(
            ['mobile' => $request->mobile ],
            ['otp' =>  $request->otp]
            ); 
                
            $mobile =  $request->mobile;  
            $user =  User::where( ['mobile' => $request->mobile ])->first()->id;
            session(['user_id' =>  $user]);  
               
         }

  


// public function firebase_login(Request $request){ 
    // Validate request data
    // $validator = Validator::make($request->all(), [
    // 'mobile' => 'required|unique:users',    
    // 'otp' => 'required', 
    // ]); 
    // if ($validator->fails()) { 
    //     $mobile =  $request->mobile;  
    //     $affectedRows = User::
    //     where('mobile',  $request->mobile)
    //     ->update(['otp' => $request->otp]);    
    //     session(['usermobile' =>  $mobile]);  
    //     return response()->json(['message' => 'user update successfully']);   
    // }              
    //     $mobile =  $request->mobile;  
    //     $firebase_credentials = new User();
    //     $firebase_credentials->mobile = $request->mobile;
    //     $firebase_credentials->otp = $request->otp;
    //     $firebase_credentials->save();       
    //     session(['usermobile' => $mobile]);  
    //     return response()->json(['message' => 'user added successfully']);
    //  }
    
 



}

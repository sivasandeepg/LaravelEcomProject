<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;  

class AdminviewController extends Controller
{
    public function adminhome(){
        return view('admin.index'); 
    }

 
    public function viewfruits(){
        return view('admin.viewfruits'); 
    }
 
    public function form_elements(){
        return view('admin.form_elements'); 
    }

     

    public function viewregistration(){
        return view('admin.signup'); 
    }
   
    public function viewadminlogin(){
        return view('admin.login');   
    }
       
    


    public function registration(Request $request){
      
        // dd( $request->all()); die;  
         
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'dob' => 'required|date|before:-18 years',
            'password' => 'required|min:6',
        ]);
            
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['status' => 'error', 'error' => $errors]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'role' => 1,
              //  'language' => $request->language,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'status' => "success",
                'message' => "successfylly saved"
            ]);

        } 
    }
  

    public function adminlogin(Request $request){

           
                // Validate request data
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'password' => 'required|min:6',
                ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['status' => 'error', 'error' => $errors]);
        } 
         
        $credentials = $request->only('email', 'password');
 
    
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            setcookie('access_token', $token); 
            $user->pw = $token;  
            session(['admin_id' =>  $user->id]); 
            session(['access_token' =>  $token]);    
            return response()->json([
                'Status' => 'success',
                'url' => 'adminindex',
                'message' => $user,
  
            ]);
        }
              
            
// Authentication failed
return response()->json([
    'status' => 'error',
    'message' => 'You have entered an incorrect username or password.',
]);
        
    }
 
  
    public function signout(Request $request)
    {
        Auth::logout();
        //Session::flush();
        session_unset();
        return Redirect('adminlogin');
        
    }

    
}

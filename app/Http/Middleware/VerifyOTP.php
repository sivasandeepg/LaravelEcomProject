<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
 
 
class VerifyOTP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
     
      // Check if user is authenticated and has verified OTP
      if ( auth()->user()->is_otp_verified ==  'pending' ) {
        // Redirect user to OTP verification page or any other action
        return redirect()->route('firebase_google_login');
    }
   
        return $next($request);
    }
}

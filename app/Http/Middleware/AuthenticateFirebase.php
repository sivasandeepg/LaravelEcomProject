<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
 
class AuthenticateFirebase
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

          // Check if user is authenticated using Firebase
          if (!Auth::check()) {
            // User is not authenticated, redirect to login page or return an error response
            return redirect()->route('firebase_google_login'); // Assuming you have a login route named 'login'
        }
    

        return $next($request);
    }
}

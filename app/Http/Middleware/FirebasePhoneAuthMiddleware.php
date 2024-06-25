<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
// use Kreait\Firebase\Auth;
use Psy\Readline\Hoa\Console;

use Kreait\Firebase\Contract\Auth;
// use Kreait\Firebase\Exception\Auth\InvalidIdToken;


class FirebasePhoneAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    // protected $auth;
    
    // public function __construct(Auth $auth)
    // {  
    //     $this->auth = $auth;
    // }

    

    public function handle($request, Closure $next)
    { 
   
       
        // if (!is_null($request->header('x-secret-key', null))) {
		// 	return $next($request);
		// }
          
        //   abort(401);

       // return response()->json(['message' => 'Unauthorized'], 401);
    }



 

    // public function handle(Request $request, Closure $next)
    // {    
    // }
}


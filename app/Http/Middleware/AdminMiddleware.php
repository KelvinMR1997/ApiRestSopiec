<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Passport\Bridge\User;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next )
    {

        //     dd(Auth::user()->role);

        // if(Auth::check() && Auth::user()->role=='admin'){
        //     return $next($request);
        // }

        // return response()->json([
        //     'res' => false,
        //     'message'=> 'No eres usuario administrador'
        //  ],200);
       
        
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        if($request->session()->has('adminuser')){
            return $next($request);
         }else{
             $request->session()->flash('msg', 'invalid request!');
                return redirect()->route('adminLogin');
             }
    }
}

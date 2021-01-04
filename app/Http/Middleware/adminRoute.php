<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminRoute
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
        if($request->session()->has('logged')){
            return $next($request);
         }else{
             
                return redirect()->route('adminLogin');
             }
    }
}

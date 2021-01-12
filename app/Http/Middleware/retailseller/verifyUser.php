<?php

namespace App\Http\Middleware\retailseller;

use Closure;
use Illuminate\Http\Request;

class verifyUser
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

        if ($request->session()->has('user')) {
            //echo "middleware reach";
            return $next($request);
        } else {
            //echo "middleware not reach";
            return redirect("/login");
        }
    }
}
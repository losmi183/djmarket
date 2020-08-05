<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()) {

            $role = auth()->user()->role;
            
            if($role == 'admin') 
            {
                return $next($request);
            }
            else {
                return redirect()->route('shop.index')->with('error', 'Forbidden Access to Admin area! You are welcome to search our Shop.');
            }
        }
        else {
            return redirect()->route('landing-page');
        }
    }
}

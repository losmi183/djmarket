<?php

namespace App\Http\Middleware;

use Closure;

class PublisherAuth
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

        if(auth()->user()) 
        {
            $role = auth()->user()->role;
            
            if($role == 'publisher' OR $role == 'admin' ) 
            {
                return $next($request);
            }
            else {
                return redirect()->route('shop.index')->with('error', 'Forbidden Access to Admin area! You are welcome to search our Shop.');
            }
        }
        else {
            return redirect()->route('login');
        }

        return $next($request);
    }
}

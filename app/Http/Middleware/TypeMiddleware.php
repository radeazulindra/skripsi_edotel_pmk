<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class TypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next, $type)
    // {
    //     foreach($type as $typex) {
    //         // Check if user has the role This check will depend on how your roles are set up
    //         if(Auth::user()->type == $typex) {
    //             return $next($request);
    //         } else {
    //             if (Auth::user()->type == 'manager' || Auth::user()->type == 'super_admin') {
    //                 return redirect()->route('home');
    //             } elseif (Auth::user()->type == 'receptionist') {
    //                 return redirect()->route('reservasi.index');
    //             } elseif (Auth::user()->type == 'store_keeper') {
    //                 return redirect()->route('barang.index');
    //             }
    //         }
    //     }   
    // }
    public function handle($request, Closure $next, $type)
    {
        if (! $request->user()->hasRole($type)) {
            return redirect()->route('home');
	    }
        return $next($request);
    }
}

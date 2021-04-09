<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminAuth
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
        if ($request->session()->has('id')) {
            if(session('role') == '0'){
                $request->session()->flash('msg','Acess Denied');
                return redirect('/login'); 
            }
        }
        return $next($request);
    }
}

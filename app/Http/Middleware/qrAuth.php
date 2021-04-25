<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\qr_codr;

class qrAuth
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
        $qr_id  = $request->route('id');
        $qr = qr_codr::where(
            [
                'added_by' => session('id'),
                'id' => $qr_id,
            ]
        )->count();
        if($qr > 0){
            return $next($request);
        }else{
            abort('404');
        }
    }
}

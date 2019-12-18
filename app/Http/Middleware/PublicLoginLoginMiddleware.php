<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PublicLoginLoginMiddleware
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
        if(Auth::user()){

            if(Auth::user()->user_type_id ==2){
                return $next($request);
            }else{
                Auth::logout();
                return redirect('/login');
            }

        }else{
            return redirect('/login');
        }
    }
}

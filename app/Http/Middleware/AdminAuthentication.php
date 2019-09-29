<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AdminAuthentication
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
        if(Auth::check()){
            // if(Auth::user()->is_admin == 1){
            //     return $next($request);
            // } else {
            //     return abort(404); 
            // }
            return $next($request);
        }
        Session::put('previous_url',URL::previous());
        return redirect('login');
    }
}

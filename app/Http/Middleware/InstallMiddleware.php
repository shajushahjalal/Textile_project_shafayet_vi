<?php

namespace App\Http\Middleware;

use Closure;
use Artisan;

class InstallMiddleware
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
        if(file_exists('config/setup.php')){
            return $next($request);
        }else{            
            return redirect('install');
        }
        
    }
}

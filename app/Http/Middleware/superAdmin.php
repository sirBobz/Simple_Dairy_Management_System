<?php

namespace App\Http\Middleware;

use Closure;

class superAdmin
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
        $user = $request->user();
        if($user && $user->user_type=="superAdmin"){
             return $next($request);
        }
       return redirect('login');
    }
}

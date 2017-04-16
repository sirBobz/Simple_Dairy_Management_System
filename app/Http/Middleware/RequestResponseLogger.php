<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Log;
use Auth;
 
class RequestResponseLogger
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
        
        return $next($request);
    }
 
    public function terminate($request, $response)
    {

        Log::info('requests', [
            'request' => $request->all(),
           // 'User Email' => Auth::user()->email,
            'IP Address' => $request->getClientIp(),
            'Method' => $request->getMethod(),
            'URL' => $request->fullUrl(),
            'response Code' => $response->getStatusCode(),

        ]);
    
    
    }
}
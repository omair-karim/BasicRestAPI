<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class AfterMiddleware
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
        $response = $next($request);
        $response->header('X-Day', Carbon::now()->format('l'));
        
        return $response;
    }
}

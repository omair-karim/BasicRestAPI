<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

class Widgets 
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
        // Validate header token
        $requestToken = $request->header('token');
        $serverToken = env('TOKEN', '');

        if ( $requestToken != $serverToken ){
            
            return response()->json(['User not Authorized.'], 401);
                
        }

        if ( !$request->isMethod('post')  ) return $next($request);


        $acceptHeader = $request->header('Accept');
        if ($acceptHeader != 'application/json') {
            return response()->json(['Only JSON request is allowed'], 406);
        }
        return $next($request);
    }
}

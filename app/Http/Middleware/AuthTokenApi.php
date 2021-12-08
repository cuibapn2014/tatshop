<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AuthTokenApi
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
        $token = isset($_GET['tokenAccess']) ? $_GET['tokenAccess'] : null;
        if($token != env('AUTH_TOKEN')){
            return response()->json(['message' => 'Coudn\'t access resource! Please provide valid token access'], 401);
        }
        return $next($request);
    }
}

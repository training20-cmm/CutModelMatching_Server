<?php

namespace App\Http\Middleware;

use App\AccessToken;
use Closure;

class TokenAuthenticationMiddleware
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
        $accessToken = AccessToken::where("token", $request->header("Authorization"))->get()->first();
        if (is_null($accessToken)) {
            return response()->invalidAccessToken();
        }
        if ($accessToken->hasExpired()) {
            return response()->expiredAccessToken();
        }
        return $next($request);
    }
}

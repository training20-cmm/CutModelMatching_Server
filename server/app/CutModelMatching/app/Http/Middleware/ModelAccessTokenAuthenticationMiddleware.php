<?php

namespace App\Http\Middleware;

use App\ModelAccessToken;
use Closure;

class ModelAccessTokenAuthenticationMiddleware
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
        $accessToken = ModelAccessToken::where("token", $request->header("Authorization"));
        if (is_null($accessToken)) {
            return response()->invalidAccessToken();
        }
        if ($accessToken->hasExpired()) {
            return response()->expiredAccessToken();
        }
        return $next($request);
    }
}

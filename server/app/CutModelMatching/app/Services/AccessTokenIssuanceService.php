<?php

namespace App\Services;

use App\AccessToken;
use App\Exceptions\ExpiredRefreshTokenException;
use App\Exceptions\OldRefreshTokenException;
use App\RefreshToken;
use Carbon\Carbon;

class AccessTokenIssuanceService
{

    public function issue(RefreshToken $refreshToken): AccessTokenIssuanceServiceOutput
    {
        $expired = (new Carbon($refreshToken->expiration))->lt(Carbon::today());
        if ($expired) {
            throw new ExpiredRefreshTokenException();
        }
        if (!$refreshToken->isLatest()) {
            throw new OldRefreshTokenException();
        }
        $expiration = Carbon::today()->addDays(30);
        $token = str_random(60);
        $parameters = [
            "expiration" => $expiration,
            "token" => $token,
            "user_id" => $refreshToken->user_id
        ];
        $accessToken = AccessToken::create($parameters);
        $refreshTokenIssuanceService = new RefreshTokenIssuanceService();
        $newRefreshToken = $refreshTokenIssuanceService->issue(
            $refreshToken->user_id
        );
        return new AccessTokenIssuanceServiceOutput(
            $accessToken,
            $newRefreshToken
        );
    }
}

class AccessTokenIssuanceServiceOutput
{

    public $accessToken;
    public $refreshToken;

    public function __construct(AccessToken $accessToken, RefreshToken $refreshToken)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }
}

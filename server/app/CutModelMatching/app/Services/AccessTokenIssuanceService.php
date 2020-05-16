<?php

namespace App\Services;

use App\Exceptions\ExpiredRefreshTokenException;
use App\Exceptions\OldRefreshTokenException;
use App\HairdresserAccessToken;
use App\HairdresserRefreshToken;
use App\ModelAccessToken;
use Carbon\Carbon;

class AccessTokenIssuanceService
{

    public static function execute($refreshToken): AccessTokenIssuanceServiceOutput
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
            "hairdresser_id" => $refreshToken->hairdresser_id
        ];
        $isHaiardresser = $refreshToken instanceof HairdresserRefreshToken;
        $idKey = $isHaiardresser ? "hairdresser_id" : "model_id";
        $id = $refreshToken[$idKey];
        $parameters[$idKey] = $id;
        $accessToken = $isHaiardresser ? HairdresserAccessToken::create($parameters) : ModelAccessToken::create($parameters);
        $newRefreshToken = RefreshTokenIssuanceService::execute(
            $id,
            $isHaiardresser
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

    public function __construct($accessToken, $refreshToken)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }
}

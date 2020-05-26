<?php

namespace App\Services;

use App\RefreshToken;
use Carbon\Carbon;

class RefreshTokenIssuanceService
{
    public function issue(int $userId): RefreshToken
    {
        $expiration = Carbon::today()->addMonths(6);
        $token = str_random(60);
        $parameters = [
            "expiration" => $expiration,
            "token" => $token,
            "user_id" => $userId
        ];
        return RefreshToken::create($parameters);
    }
}

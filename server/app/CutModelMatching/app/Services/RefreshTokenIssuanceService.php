<?php

namespace App\Services;

use App\HairdresserRefreshToken;
use App\ModelRefreshToken;
use Carbon\Carbon;

class RefreshTokenIssuanceService
{
    public static function execute(int $id, bool $isHairdresser)
    {
        $expiration = Carbon::today()->addMonths(6);
        $token = str_random(60);
        $parameters = [
            "expiration" => $expiration,
            "token" => $token
        ];
        if ($isHairdresser) {
            $parameters["hairdresser_id"] = $id;
            return HairdresserRefreshToken::create($parameters);
        } else {
            $parameters["model_id"] = $id;
            return ModelRefreshToken::create($parameters);
        }
    }
}

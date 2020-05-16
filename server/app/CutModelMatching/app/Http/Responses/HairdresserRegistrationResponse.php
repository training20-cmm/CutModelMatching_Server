<?php

namespace App\Http\Responses;

use App\HairdresserAccessToken;
use App\HairdresserRefreshToken;
use App\Hairdresser;

class HairdresserRegistrationResponse extends Response
{

    public $hairdresser;
    public $hairdresserAccessToken;
    public $hairdresserRefreshToken;

    public function __construct(Hairdresser $hairdresser, HairdresserAccessToken $hairdresserAccessToken, HairdresserRefreshToken $hairdresserRefreshToken)
    {
        $this->hairdresser = new HairdresserResponse($hairdresser);
        $this->hairdresserAccessToken = new AccessTokenResponse($hairdresserAccessToken);
        $this->hairdresserRefreshToken = new RefreshTokenResponse($hairdresserRefreshToken);
    }
}

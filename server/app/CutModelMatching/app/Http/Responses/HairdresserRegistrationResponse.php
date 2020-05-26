<?php

namespace App\Http\Responses;

use App\AccessToken;
use App\Hairdresser;
use App\RefreshToken;

class HairdresserRegistrationResponse extends Response
{

    public $hairdresser;
    public $accessToken;
    public $refreshToken;

    public function __construct(
        Hairdresser $hairdresser,
        AccessToken $accessToken,
        RefreshToken $refreshToken
    ) {
        $this->hairdresser = new HairdresserResponse($hairdresser);
        $this->accessToken = new AccessTokenResponse($accessToken);
        $this->refreshToken = new RefreshTokenResponse($refreshToken);
    }
}

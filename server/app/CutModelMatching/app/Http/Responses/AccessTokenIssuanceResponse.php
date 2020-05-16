<?php

namespace App\Http\Responses;

class AccessTokenIssuanceResponse extends Response
{

    public $accessToken;
    public $refreshToken;

    public function __construct($accessToken, $refreshToken)
    {
        $this->accessToken = new AccessTokenResponse($accessToken);
        $this->refreshToken = new RefreshTokenResponse($refreshToken);
    }
}

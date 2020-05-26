<?php

namespace App\Http\Responses;

use App\AccessToken;
use App\RefreshToken;
use App\User;

class UserRegistrationResponse extends Response
{

    public $user;
    public $accessToken;
    public $refreshToken;

    public function __construct(User $user, AccessToken $accessToken, RefreshToken $refreshToken)
    {
        $this->model = new UserResponse($user);
        $this->accessToken = new AccessTokenResponse($accessToken);
        $this->refreshToken = new RefreshTokenResponse($refreshToken);
    }
}

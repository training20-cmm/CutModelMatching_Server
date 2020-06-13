<?php

namespace App\Http\Responses;

use App\AccessToken;
use App\Model;
use App\RefreshToken;

class ModelRegistrationResponse extends Response
{

    public $model;
    public $accessToken;
    public $refreshToken;

    public function __construct(
        Model $model,
        AccessToken $accessToken,
        RefreshToken $refreshToken
    ) {
        $this->model = new ModelResponse();
        $this->model->constructWith($model);
        $this->accessToken = new AccessTokenResponse($accessToken);
        $this->refreshToken = new RefreshTokenResponse($refreshToken);
    }
}

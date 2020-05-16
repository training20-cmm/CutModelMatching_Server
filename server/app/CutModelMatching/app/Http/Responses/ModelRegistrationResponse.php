<?php

namespace App\Http\Responses;

use App\ModelAccessToken;
use App\ModelRefreshToken;
use App\Model;

class ModelRegistrationResponse extends Response
{

    public $model;
    public $modelAccessToken;
    public $modelRefreshToken;

    public function __construct(Model $model, ModelAccessToken $modelAccessToken, ModelRefreshToken $modelRefreshToken)
    {
        $this->model = new ModelResponse($model);
        $this->modelAccessToken = new AccessTokenResponse($modelAccessToken);
        $this->modelRefreshToken = new RefreshTokenResponse($modelRefreshToken);
    }
}

<?php

namespace App\Services;

use App\Model;
use App\ModelAccessToken;
use App\ModelRefreshToken;
use App\Services\AccessTokenIssuanceService;
use Illuminate\Support\Facades\Hash;

class ModelRegistrationService
{

    public static function execute(string $name, string $identifier, string $rawPassword): ModelRegistrationServiceOutput
    {
        $password = Hash::make($rawPassword);
        $model = Model::create([
            "name" => $name,
            "identifier" => $identifier,
            "password" => $password
        ]);
        $refreshToken = RefreshTokenIssuanceService::execute($model->id, false);
        $accessTokenIssuanceServiceOutput = AccessTokenIssuanceService::execute($refreshToken);
        return new ModelRegistrationServiceOutput(
            $model,
            $accessTokenIssuanceServiceOutput->accessToken,
            $accessTokenIssuanceServiceOutput->refreshToken
        );
    }
}

class ModelRegistrationServiceOutput
{
    public $model;
    public $accessToken;
    public $refreshToken;

    public function __construct(
        Model $model,
        ModelAccessToken $accessToken,
        ModelRefreshToken $refreshToken
    ) {
        $this->model = $model;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }
}

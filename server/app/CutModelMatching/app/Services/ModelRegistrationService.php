<?php

namespace App\Services;

use App\AccessToken;
use App\Model;
use App\RefreshToken;
use App\User;
use App\UserType;

class ModelRegistrationService
{

    public function register(
        string $identifier,
        string $rawPassword,
        string $name,
        string $gender,
        string $birthday
    ): ModelRegistrationServiceOutput {
        $userRegistrationService = new UserRegistrationService();
        $userRegistrationServiceOutput = $userRegistrationService->register(
            $identifier,
            $rawPassword,
            UserType::NAME_MODEL
        );
        $parameters = [
            "name" => $name,
            "gender" => $gender,
            "birthday" => $birthday,
            "user_id" => $userRegistrationServiceOutput->user->id
        ];
        $model = Model::create($parameters);
        return new ModelRegistrationServiceOutput(
            $userRegistrationServiceOutput->user,
            $userRegistrationServiceOutput->accessToken,
            $userRegistrationServiceOutput->refreshToken,
            $model
        );
    }
}

class ModelRegistrationServiceOutput
{
    public $user;
    public $accessToken;
    public $refreshToken;
    public $model;

    public function __construct(
        User $user,
        AccessToken $accessToken,
        RefreshToken $refreshToken,
        Model $model
    ) {
        $this->user = $user;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->model = $model;
    }
}

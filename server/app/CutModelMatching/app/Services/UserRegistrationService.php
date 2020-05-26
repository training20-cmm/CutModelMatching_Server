<?php

namespace App\Services;

use App\AccessToken;
use App\Hairdresser;
use App\Model;
use App\RefreshToken;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Hash;

class UserRegistrationService
{

    public function register(
        string $identifier,
        string $rawPassword,
        string $userTypeName
    ) {
        $password = Hash::make($rawPassword);
        $userType = UserType::where("name", $userTypeName)->get()->first();
        $parameters = [
            "identifier" => $identifier,
            "password" => $password,
            "type_id" => $userType->id
        ];
        $user = User::create($parameters);
        $refreshTokenIssuanceService = new RefreshTokenIssuanceService();
        $refreshToken = $refreshTokenIssuanceService->issue($user->id);
        $accessTokenIssuance = new AccessTokenIssuanceService();
        $accessTokenIssuanceServiceOutput = $accessTokenIssuance->issue($refreshToken);
        return new UserRegistrationServiceOutput(
            $user,
            $accessTokenIssuanceServiceOutput->accessToken,
            $accessTokenIssuanceServiceOutput->refreshToken
        );
    }
}

class UserRegistrationServiceOutput
{
    public $user;
    public $accessToken;
    public $refreshToken;

    public function __construct(
        User $user,
        AccessToken $accessToken,
        RefreshToken $refreshToken
    ) {
        $this->user = $user;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }
}

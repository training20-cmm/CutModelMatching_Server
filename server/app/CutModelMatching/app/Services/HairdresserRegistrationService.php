<?php

namespace App\Services;

use App\AccessToken;
use App\Hairdresser;
use App\RefreshToken;
use App\User;
use App\UserType;

class HairdresserRegistrationService
{

    public function register(
        string $identifier,
        string $rawPassword,
        string $name,
        string $gender,
        string $birthday
    ): HairdresserRegistrationServiceOutput {
        $userRegistrationService = new UserRegistrationService();
        $userRegistrationServiceOutput = $userRegistrationService->register(
            $identifier,
            $rawPassword,
            UserType::NAME_HAIRDRESSER
        );
        $parameters = [
            "name" => $name,
            "gender" => $gender,
            "birthday" => $birthday,
            "user_id" => $userRegistrationServiceOutput->user->id
        ];
        $hairdresser = Hairdresser::create($parameters);
        return new HairdresserRegistrationServiceOutput(
            $userRegistrationServiceOutput->user,
            $userRegistrationServiceOutput->accessToken,
            $userRegistrationServiceOutput->refreshToken,
            $hairdresser
        );
    }
}

class HairdresserRegistrationServiceOutput
{
    public $user;
    public $accessToken;
    public $refreshToken;
    public $hairdresser;

    public function __construct(
        User $user,
        AccessToken $accessToken,
        RefreshToken $refreshToken,
        Hairdresser $hairdresser
    ) {
        $this->user = $user;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->hairdresser = $hairdresser;
    }
}

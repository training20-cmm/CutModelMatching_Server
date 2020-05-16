<?php

namespace App\Services;

use App\Hairdresser;
use App\HairdresserAccessToken;
use App\HairdresserRefreshToken;
use App\Services\AccessTokenIssuanceService;
use Illuminate\Support\Facades\Hash;

class HairdresserRegistrationService
{

    public static function execute(string $name, string $identifier, string $rawPassword): HairdresserRegistrationServiceOutput
    {
        $password = Hash::make($rawPassword);
        $hairdresser = Hairdresser::create([
            "name" => $name,
            "identifier" => $identifier,
            "password" => $password
        ]);
        $refreshToken = RefreshTokenIssuanceService::execute($hairdresser->id, true);
        $accessTokenIssuanceServiceOutput = AccessTokenIssuanceService::execute($refreshToken);
        return new HairdresserRegistrationServiceOutput(
            $hairdresser,
            $accessTokenIssuanceServiceOutput->accessToken,
            $accessTokenIssuanceServiceOutput->refreshToken
        );
    }
}

class HairdresserRegistrationServiceOutput
{
    public $hairdresser;
    public $accessToken;
    public $refreshToken;

    public function __construct(
        Hairdresser $hairdresser,
        HairdresserAccessToken $accessToken,
        HairdresserRefreshToken $refreshToken
    ) {
        $this->hairdresser = $hairdresser;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }
}

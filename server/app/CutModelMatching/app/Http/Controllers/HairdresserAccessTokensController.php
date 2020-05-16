<?php

namespace App\Http\Controllers;

use App\Exceptions\ExpiredRefreshTokenException;
use App\HairdresserRefreshToken;
use App\Http\Requests\HairdresserAccessTokenIssueRequest;
use App\Http\Responses\AccessTokenIssuanceResponse;
use App\Services\AccessTokenIssuanceService;

class HairdresserAccessTokensController extends Controller
{

    public function issue(HairdresserAccessTokenIssueRequest $request)
    {
        try {
            $refreshToken = HairdresserRefreshToken::where("token", $request->refreshToken)->first();
            if (is_null($refreshToken)) {
                return response()->invalidRefreshToken();
            }
            $accessTokenIssuanceServiceOutput = AccessTokenIssuanceService::execute($refreshToken);
            return new AccessTokenIssuanceResponse(
                $accessTokenIssuanceServiceOutput->accessToken,
                $accessTokenIssuanceServiceOutput->refreshToken
            );
        } catch (ExpiredRefreshTokenException $exception) {
            return response()->expiredRefreshToken();
        }
    }
}

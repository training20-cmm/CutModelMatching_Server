<?php

namespace App\Http\Controllers;

use App\Exceptions\ExpiredRefreshTokenException;
use App\Http\Requests\ModelAccessTokenIssueRequest;
use App\Http\Responses\AccessTokenIssuanceResponse;
use App\ModelRefreshToken;
use App\Services\AccessTokenIssuanceService;

class ModelAccessTokensController extends Controller
{

    public function issue(ModelAccessTokenIssueRequest $request)
    {
        try {
            $refreshToken = ModelRefreshToken::where("token", $request->refreshToken)->first();
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

<?php

namespace App\Providers;

use App\ErrorCode;
use App\Http\Responses\ErrorResponse;
use App\HttpStatusCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Response::macro("invalidRefreshToken", function () {
            return Response::json(
                new ErrorResponse(ErrorCode::INVALID_REFRESH_TOKEN, "Invalid Refresh Token", ""),
                HttpStatusCode::BAD_REQUEST
            );
        });

        Response::macro("expiredRefreshToken", function () {
            return Response::json(
                new ErrorResponse(ErrorCode::EXPIRED_REFRESH_TOKEN, "Refresh Token expired", ""),
                HttpStatusCode::BAD_REQUEST
            );
        });

        Response::macro("invalidAccessToken", function () {
            return Response::json(
                new ErrorResponse(ErrorCode::INVALID_ACCESS_TOKEN, "Invalid Access Token", ""),
                HttpStatusCode::BAD_REQUEST
            );
        });

        Response::macro("expiredAccessToken", function () {
            return Response::json(
                new ErrorResponse(ErrorCode::EXPIRED_ACCESS_TOKEN, "Expired Access Token", ""),
                HttpStatusCode::BAD_REQUEST
            );
        });
    }
}

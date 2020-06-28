<?php

namespace App\Http\Controllers;

use App\AccessToken;
use App\ErrorCode;
use App\Http\Responses\ErrorResponse;
use App\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static function user(string $token): User
    {
        return AccessToken::where("token", $token)->get()->first()->user()->get()->first();
    }

    protected static function badRequest()
    {
        return response("", 400);
    }

    protected static function forbidden()
    {
        return response("", 403);
    }

    protected static function notFound()
    {
        $erroResponse = new ErrorResponse(ErrorCode::RESOURCE_NOT_FOUND, "RESOURCE NOT FOUND", "Specified resource does not exist on this server.");
        return response(
            json_encode($erroResponse),
            404
        );
    }
}

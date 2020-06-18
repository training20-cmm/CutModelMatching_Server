<?php

namespace App\Http\Controllers;

use App\AccessToken;
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

    protected static function badRequest(): ResponseFactory
    {
        $a = response();
        return response("", 400);
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => "api"], function () {
    Route::get("hairdressers", "HairdressersController@index");
    Route::post("hairdressers/register", "HairdressersController@register");
    Route::post("/model_access_tokens", "ModelAccessTokensController@issue");
    Route::post("/models/register", "ModelsController@register");
});

Route::group(["middleware" => ["api", "auth.model.token"]], function () {
});

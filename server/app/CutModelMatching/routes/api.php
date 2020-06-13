<?php

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
    Route::post("hairdressers/register", "Api\HairdressersController@register");
    Route::post("models/register", "Api\ModelsController@register");
    Route::get("chat_rooms/history", "Api\ChatRoomsController@history");
});

Route::group(["middleware" => ["api", "auth.token"]], function () {
    Route::get("chat_messages", "Api\ChatMessagesController@index");
});

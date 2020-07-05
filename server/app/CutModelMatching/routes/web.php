<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/dashboard/analytics', "DashboardController@analytics");
Route::get('/dashboard/management/treatment', "DashboardController@managementTreatment");
Route::get("/hairdressers/count", "HairdressersController@count");
Route::get("/menu_treatment", "MenuTreatmentController@index");
Route::post("/menu_treatment", "MenuTreatmentController@store");
Route::get("/menus/count_by_menu_treatment_id", "MenusController@countByMenuTreatmentId");
Route::get("/models/count", "ModelsController@count");

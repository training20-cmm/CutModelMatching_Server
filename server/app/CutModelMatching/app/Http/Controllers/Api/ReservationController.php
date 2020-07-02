<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\HairdresserResponse;
use App\Http\Responses\MenuResponse;
use App\Http\Responses\MenuTimeResponse;
use App\Http\Responses\ReservationResponse;
use App\Http\Responses\SalonResponse;
use App\MenuTime;
use App\Model;
use App\QueryAdapter;
use App\Reservation;

class ReservationController extends Controller
{

    public function index(CustomRequest $request)
    {
        // $queryAdapter = new QueryAdapter();
        // $reservationList = $queryAdapter->execute(Reservation::class, $request->all());
        $reservationList = Reservation::all()->all();
        $reservationResponses = array_map(function ($reservation) {
            $reservationResponse = new ReservationResponse();
            $reservationResponse->constructWith($reservation);
            return $reservationResponse;
        }, $reservationList);
        return $reservationResponses;
    }

    public function next(CustomRequest $request)
    {
        $user = self::user($request->token());
        $model = Model::where("user_id", $user->id)->get()->first();
        if (is_null($model)) {
            return self::badRequest();
        }
        $nextReservation = Reservation::with(["menu.hairdresser.salon"])
            ->where("model_id", $model->id)->orderBy("id")->get()->first();
        if (is_null($nextReservation)) {
            return self::notFound();
        }
        $menuTime = MenuTime::where("id", $nextReservation->menu_time_id)->get()->first();
        $reservationResponse = new ReservationResponse();
        $reservationResponse->constructWith($nextReservation);
        $menuResponse = new MenuResponse();
        $menuResponse->constructWith($nextReservation->menu);
        $menuTimeResponse = new MenuTimeResponse();
        $menuTimeResponse->constructWith($menuTime);
        $menuResponse->time = [$menuTimeResponse];
        $hairdresserResponse = new HairdresserResponse();
        $hairdresserResponse->constructWith($nextReservation->menu->hairdresser);
        $salon = new SalonResponse();
        $salon->constructWith($nextReservation->menu->hairdresser->salon);
        $hairdresserResponse->salon = $salon;
        $menuResponse->hairdresser = $hairdresserResponse;
        $reservationResponse->menu = $menuResponse;
        return $reservationResponse;
    }

    public function store(CustomRequest $request)
    {
        $user = self::user($request->token());
        $model = Model::where("user_id", $user->id)->get()->first();
        if (is_null($model)) {
            return self::badRequest();
        }
        $reservation = Reservation::create([
            "menu_id" => $request->menuId,
            "menu_time_id" => $request->menuTimeId,
            "model_id" => $model->id
        ]);
        $reservationResponse = new ReservationResponse();
        $reservationResponse->constructWith($reservation);
        return $reservationResponse;
    }
}

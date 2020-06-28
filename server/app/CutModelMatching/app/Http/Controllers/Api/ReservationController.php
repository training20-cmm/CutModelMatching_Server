<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\ReservationResponse;
use App\Model;
use App\QueryAdapter;
use App\Reservation;

class ReservationController extends Controller
{

    public function index(CustomRequest $request)
    {
        $queryAdapter = new QueryAdapter();
        $reservationList = $queryAdapter->execute(Reservation::class, $request->all());
        $reservationResponses = array_map(function ($reservation) {
            $reservationResponse = new ReservationResponse();
            $reservationResponse->constructWith($reservation);
            return $reservationResponse;
        }, $reservationList);
        return $reservationResponses;
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

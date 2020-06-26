<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\ReservationResponse;
use App\QueryAdapter;
use App\Reservation;

class ReservationController extends Controller
{

    public function index(CustomRequest $request)
    {
        $queryAdapter = new QueryAdapter();
        $reservationList = $queryAdapter->execute(Reservation::class, $request->all());
        return array_map(function ($reservation) {
            $reservationResponse = new ReservationResponse();
            $reservationResponse->constructWith($reservation);
            return $reservationResponse;
        }, $reservationList);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Hairdresser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Requests\QueryRequest;
use App\Http\Responses\HairdresserRegistrationResponse;
use App\Http\Responses\HairdresserResponse;
use App\Http\Responses\SalonResponse;
use App\QueryAdapter;
use App\Services\HairdresserRegistrationService;

class HairdressersController extends Controller
{

    public function me(CustomRequest $request)
    {
        $user = self::user($request->token());
        $hairdresser = Hairdresser::where("user_id", $user->id)->get()->first();
        if (is_null($hairdresser)) {
            return self::badRequest();
        }
        $hairdresserResponse = new HairdresserResponse();
        $hairdresserResponse->constructWith($hairdresser);
        if (!is_null($hairdresser->salon)) {
            $hairdresserResponse->salon = new SalonResponse();
            $hairdresserResponse->salon->constructWith($hairdresser->salon);
        }
        return $hairdresserResponse;
    }

    public function register(QueryRequest $request)
    {
        $hairdresserRegistrationService = new HairdresserRegistrationService();
        $hairdresserRegistrationServiceOutput = $hairdresserRegistrationService->register(
            $request->identifier,
            $request->password,
            $request->name,
            $request->gender,
            $request->birthday
        );
        if ($request->hasQuery()) {
            $queryAdapter = new QueryAdapter();
            $hairdresserRegistrationServiceOutput->hairdresser = $queryAdapter->executeWithId(
                Hairdresser::class,
                $request->all(),
                $hairdresserRegistrationServiceOutput->hairdresser->id
            )[0];
        }
        return new HairdresserRegistrationResponse(
            $hairdresserRegistrationServiceOutput->hairdresser,
            $hairdresserRegistrationServiceOutput->accessToken,
            $hairdresserRegistrationServiceOutput->refreshToken
        );
    }
}

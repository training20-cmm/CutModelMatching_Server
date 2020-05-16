<?php

namespace App\Http\Controllers;

use App\Hairdresser;
use App\Http\Requests\HairdresserRegistrationRequest;
use App\Http\Responses\HairdresserRegistrationResponse;
use App\QueryAdapter;
use App\Services\HairdresserRegistrationService;
use Illuminate\Http\Request;

class HairdressersController extends Controller
{

    public function index(Request $request)
    {
        $hairdressers = QueryAdapter::execute(Hairdresser::class, $request->all());
        return $hairdressers;
    }

    public function register(HairdresserRegistrationRequest $request)
    {
        $hairdresserRegistrationServiceOutput = HairdresserRegistrationService::execute(
            $request->name,
            $request->identifier,
            $request->password
        );
        return new HairdresserRegistrationResponse(
            $hairdresserRegistrationServiceOutput->hairdresser,
            $hairdresserRegistrationServiceOutput->accessToken,
            $hairdresserRegistrationServiceOutput->refreshToken
        );
    }
}

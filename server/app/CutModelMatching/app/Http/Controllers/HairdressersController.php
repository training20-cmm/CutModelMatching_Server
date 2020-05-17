<?php

namespace App\Http\Controllers;

use App\Hairdresser;
use App\Http\Requests\HairdresserRegistrationRequest;
use App\Http\Responses\HairdresserRegistrationResponse;
use App\Query;
use App\Services\HairdresserRegistrationService;
use App\TestA;
use Illuminate\Http\Request;

class HairdressersController extends Controller
{

    public function test(Request $request)
    {
        $a = Query::execute(TestA::class, $request->all());
        return $a;
    }

    public function index(Request $request)
    {
        $hairdressers = Query::execute(Hairdresser::class, $request->all());
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

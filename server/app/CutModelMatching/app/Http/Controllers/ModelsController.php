<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelRegistrationRequest;
use App\Http\Responses\ModelRegistrationResponse;
use App\Services\ModelRegistrationService;

class ModelsController extends Controller
{


    public function register(ModelRegistrationRequest $request)
    {
        $modelRegistrationServiceOutput = ModelRegistrationService::execute(
            $request->name,
            $request->identifier,
            $request->password
        );
        return new ModelRegistrationResponse(
            $modelRegistrationServiceOutput->model,
            $modelRegistrationServiceOutput->accessToken,
            $modelRegistrationServiceOutput->refreshToken
        );
    }
}

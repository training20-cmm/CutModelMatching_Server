<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Requests\QueryRequest;
use App\Http\Responses\ModelRegistrationResponse;
use App\Http\Responses\ModelResponse;
use App\Model;
use App\QueryAdapter;
use App\Services\ModelRegistrationService;

class ModelsController extends Controller
{

    public function me(CustomRequest $request)
    {
        $user = self::user($request->token());
        $model = Model::where("user_id", $user->id)->get()->first();
        if (is_null($model)) {
            return self::badRequest();
        }
        $queryAdapter = new QueryAdapter();
        $model = $queryAdapter->executeWithId(Model::class, $request->all(), $model->id)[0];
        $modelResponse = new ModelResponse();
        $modelResponse->constructWith($model);
        return $modelResponse;
    }

    public function register(QueryRequest $request)
    {
        $modelRegistrationService = new ModelRegistrationService();
        $modelRegistrationServiceOutput = $modelRegistrationService->register(
            $request->identifier,
            $request->password,
            $request->name,
            $request->gender,
            $request->birthday
        );
        if ($request->hasQuery()) {
            $queryAdapter = new QueryAdapter();
            $modelRegistrationServiceOutput->model = $queryAdapter->executeWithId(
                Model::class,
                $request->all(),
                $modelRegistrationServiceOutput->model->id
            )[0];
        }
        return new ModelRegistrationResponse(
            $modelRegistrationServiceOutput->model,
            $modelRegistrationServiceOutput->accessToken,
            $modelRegistrationServiceOutput->refreshToken
        );
    }
}

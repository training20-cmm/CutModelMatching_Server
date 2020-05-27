<?php

namespace App\Http\Controllers;

use App\ChatRoom;
use App\Hairdresser;
use App\Http\Requests\CustomRequest;
use App\Model;
use App\QueryAdapter;
use App\UserType;
use Illuminate\Http\Request;

class ChatRoomsController extends Controller
{

    public function history(CustomRequest $customRequest)
    {
        $user = self::user($customRequest->token());
        $userType = $user->type()->get()->first();
        $eloquent = null;
        switch ($userType->name) {
            case UserType::NAME_HAIRDRESSER:
                $hairdresser = Hairdresser::where("user_id", $user->id)->get()->first();
                $eloquent = ChatRoom::where("hairdresser_id", $hairdresser->id);
            case UserType::NAME_MODEL:
                $model = Model::where("user_id", $user->id)->get()->first();
                $eloquent = ChatRoom::where("model_id", $model->id);
        }
        $queryAdapter = new QueryAdapter();
        return $queryAdapter->executeWithBuilder($eloquent, $customRequest->all());
    }
}

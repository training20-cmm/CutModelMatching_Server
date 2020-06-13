<?php

namespace App\Http\Controllers\Api;

use App\ChatRoom;
use App\Hairdresser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\ChatMessageResponse;
use App\Http\Responses\ChatRoomHistoryHairdresserResponse;
use App\Http\Responses\ModelResponse;
use App\Model;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\DB;

class ChatRoomsController extends Controller
{

    public function history(CustomRequest $customRequest)
    {
        $user = self::user($customRequest->token());
        $userType = $user->type()->get()->first();
        // $idKey = "";
        // $idValue = "";
        switch ($userType->name) {
            case UserType::NAME_HAIRDRESSER:
                return $this->historyHairdresser($customRequest, $user);
                // $hairdresser = Hairdresser::where("user_id", $user->id)->get()->first();
                // $idKey = "hairdresser_id";
                // $idValue = $hairdresser->id;
                // break;
            case UserType::NAME_MODEL:
                return $this->historyModel($customRequest, $user);
                // $model = Model::where("user_id", $user->id)->get()->first();
                // // $eloquent = ChatRoom::where("model_id", $model->id);
                // $idKey = "model_id";
                // $idValue = $model->id;
                // break;
        }
        // return DB::table("chat_rooms as cr")
        //     ->select(
        //         "cr.id as cr_id",
        //         "cm1.id as cm_id",
        //         "cm1.created_at as cm_created_at"
        //     )
        //     ->join("chat_messages as cm1", function ($join) {
        //         $join->on("cr.id", "cm1.chat_room_id")->where("cm1.id", function ($query) {
        //             $query->select("cm2.id")->from("chat_messages as cm2")->whereRaw("cm2.chat_room_id = cr.id")->orderBy("cm2.id", "desc")->limit(1);
        //         });
        //     })
        //     ->where($idKey, $idValue)
        //     ->get()->all();
    }

    private function historyHairdresser(CustomRequest $customRequest, User $user)
    {
        $hairdresser = Hairdresser::where("user_id", $user->id)->get()->first();
        $chatRooms = DB::table("chat_rooms as cr")
            ->select(
                "cr.id as cr_id",
                "cm1.id as cm_id",
                "cm1.content as cm_content",
                "cm1.image_path as cm_image_path",
                "cm1.created_at as cm_created_at",
                "m.name as m_name"
            )
            ->join("chat_messages as cm1", function ($join) {
                $join->on("cr.id", "cm1.chat_room_id")->where("cm1.id", function ($query) {
                    $query->select("cm2.id")->from("chat_messages as cm2")->whereRaw("cm2.chat_room_id = cr.id")->orderBy("cm2.id", "desc")->limit(1);
                });
            })
            ->join("models as m", "m.id", "cr.model_id")
            ->where("cr.hairdresser_id", $hairdresser->id)
            ->get()->all();
        $chatRoomHistoryResponses = [];
        foreach ($chatRooms as $chatRoom) {
            $chatMessageResponse = new ChatMessageResponse();
            $chatMessageResponse->content = $chatRoom->cm_content;
            $chatMessageResponse->imagePath = $chatRoom->cm_image_path;
            $chatMessageResponse->createdAt = $chatRoom->cm_created_at;
            $modelResponse = new ModelResponse();
            $modelResponse->name = $chatRoom->m_name;
            $chatRoomHistoryResponse = new ChatRoomHistoryHairdresserResponse();
            $chatRoomHistoryResponse->fillWith($chatMessageResponse, $modelResponse);
            $chatRoomHistoryResponses[] = $chatRoomHistoryResponse;
        }
        return $chatRoomHistoryResponses;
    }

    private function historyModel(CustomRequest $customRequest, User $user)
    {
        $model = Model::where("user_id", $user->id)->get()->first();
        return DB::table("chat_rooms as cr")
            ->select(
                "cm1.content as cm_content",
                "cm1.image_path as cm_image_path",
                "cm1.created_at as cm_created_at",
                "h.name as h_name",
                "h.profile_image_path as h_profile_image_path"
            )
            ->join("chat_messages as cm1", function ($join) {
                $join->on("cr.id", "cm1.chat_room_id")->where("cm1.id", function ($query) {
                    $query->select("cm2.id")->from("chat_messages as cm2")->whereRaw("cm2.chat_room_id = cr.id")->orderBy("cm2.id", "desc")->limit(1);
                });
            })
            ->join("hairdressers as h", "h.id", "cr.hairdresser_id")
            ->where("cr.model_id", $model->id)
            ->get()->all();
    }
}

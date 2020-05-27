<?php

namespace App\Http\Controllers\Api;

use App\AccessToken;
use App\ChatMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\ChatMessageResponse;
use App\QueryAdapter;

class ChatMessagesController extends Controller
{

    public function index(CustomRequest $request)
    {
        // TODO: 

        // $user = AccessToken::where("token", $request->token())->get()->first()->user()->get()->first();
        // $eloquent = ChatMessage::where("sender_user_id", $user->id)->orWhere("receiver_user_id", $user->id);
        // $queryAdapter = new QueryAdapter();
        // $chatMessages = $queryAdapter->executeWithBuilder($eloquent, $request->all());
        // return array_map(function ($chatMessage) {
        //     return new ChatMessageResponse($chatMessage);
        // }, $chatMessages);
    }
}

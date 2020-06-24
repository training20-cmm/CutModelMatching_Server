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
    }
}

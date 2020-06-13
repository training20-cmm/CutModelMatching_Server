<?php

namespace App\Http\Responses;

use App\AccessToken;

class AccessTokenResponse extends Response
{

    public $id;
    public $expiration;
    public $token;
    public $hairdresserId;
    public $createdAt;
    public $updatedAt;

    public function __construct(AccessToken $accessToken)
    {
        $this->id = $accessToken->id;
        $this->expiration = $accessToken->expiration->toDateString();
        $this->token = $accessToken->token;
        $this->hairdresserId = $accessToken->hairdresser_id;
        $this->createdAt = $accessToken->created_at->toDateString();
        $this->updatedAt = $accessToken->updated_at->toDateString();
    }
}

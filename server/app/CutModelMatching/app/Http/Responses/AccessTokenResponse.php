<?php

namespace App\Http\Responses;


class AccessTokenResponse extends Response
{

    public $id;
    public $expiration;
    public $token;
    public $hairdresserId;
    public $createdAt;
    public $updatedAt;

    public function __construct($accessToken)
    {
        $this->id = $accessToken->id;
        $this->expiration = $accessToken->expiration;
        $this->token = $accessToken->token;
        $this->hairdresserId = $accessToken->hairdresser_id;
        $this->createdAt = $accessToken->created_at;
        $this->updatedAt = $accessToken->updated_at;
    }
}

<?php

namespace App\Http\Responses;


class RefreshTokenResponse extends Response
{

    public $id;
    public $expiration;
    public $token;
    public $hairdresserId;
    public $createdAt;
    public $updatedAt;

    public function __construct($refreshToken)
    {
        info($refreshToken->expiration);
        $this->id = $refreshToken->id;
        $this->expiration = $refreshToken->expiration->toDateString();
        $this->token = $refreshToken->token;
        $this->hairdresserId = $refreshToken->hairdresser_id;
        $this->createdAt = $refreshToken->created_at->toDateString();
        $this->updatedAt = $refreshToken->updated_at->toDateString();
    }
}

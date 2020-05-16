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

    public function __construct($hairdresserRefreshToken)
    {
        $this->id = $hairdresserRefreshToken->id;
        $this->expiration = $hairdresserRefreshToken->expiration;
        $this->token = $hairdresserRefreshToken->token;
        $this->hairdresserId = $hairdresserRefreshToken->hairdresser_id;
        $this->createdAt = $hairdresserRefreshToken->created_at;
        $this->updatedAt = $hairdresserRefreshToken->updated_at;
    }
}

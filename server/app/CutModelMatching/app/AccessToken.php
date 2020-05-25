<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    const TOKEN_MAX_LENGTH = 60;

    protected $fillable = ["token", "expiration", "user_id"];

    public function hasExpired(): bool
    {
        return (new Carbon($this->expiration))->lt(Carbon::today());
    }

    public function isLatest(): bool
    {
        $latestAccessToken = AccessToken::where("user_id", $this->user_id)->orderBy("id", "desc")->first();
        return $latestAccessToken->id === $this->id;
    }
}

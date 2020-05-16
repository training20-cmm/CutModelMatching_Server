<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HairdresserAccessToken extends Model
{

    const TOKEN_MAX_LENGTH = 60;

    protected $fillable = ["token", "expiration", "hairdresser_id"];

    public function hasExpired(): bool
    {
        return (new Carbon($this->expiration))->lt(Carbon::today());
    }

    public function isLatest(): bool
    {
        $latestRefreshToken = HairdresserRefreshToken::where("hairdresser_id", $this->hairdresser_id)->orderBy("id", "desc")->first();
        return $latestRefreshToken->id === $this->id;
    }
}

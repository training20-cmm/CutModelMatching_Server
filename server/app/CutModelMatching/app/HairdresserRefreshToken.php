<?php

namespace App;

use App\Domain\HairdresserId;
use App\Domain\HairdresserRefreshToken as DomainHairdresserRefreshToken;
use App\Domain\HairdresserRefreshTokenCreatedAt;
use App\Domain\HairdresserRefreshTokenExpiration;
use App\Domain\HairdresserRefreshTokenId;
use App\Domain\HairdresserRefreshTokenToken;
use App\Domain\HairdresserRefreshTokenUpdatedAt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HairdresserRefreshToken extends Model
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

    public function domain(): DomainHairdresserRefreshToken
    {
        return DomainHairdresserRefreshToken::create(
            HairdresserRefreshTokenId::create($this->id),
            HairdresserRefreshTokenExpiration::create(new Carbon($this->expiration)),
            HairdresserRefreshTokenToken::create($this->token),
            HairdresserId::create($this->hairdresser_id),
            HairdresserRefreshTokenCreatedAt::create(new Carbon($this->created_at)),
            HairdresserRefreshTokenUpdatedAt::create(new Carbon($this->updated_at))
        );
    }
}

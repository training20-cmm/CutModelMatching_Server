<?php

namespace App;

use App\Domain\ModelRefreshToken as DomainModelRefreshToken;
use App\Domain\ModelRefreshTokenCreatedAt;
use App\Domain\ModelRefreshTokenExpiration;
use App\Domain\ModelRefreshTokenId;
use App\Domain\ModelRefreshTokenToken;
use App\Domain\ModelRefreshTokenUpdatedAt;
use App\Domain\ModelId;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ModelRefreshToken extends Model
{

    const TOKEN_MAX_LENGTH = 60;

    protected $fillable = ["token", "expiration", "model_id"];

    public function hasExpired(): bool
    {
        return (new Carbon($this->expiration))->lt(Carbon::today());
    }

    public function isLatest(): bool
    {
        $latestRefreshToken = ModelRefreshToken::where("model_id", $this->model_id)->orderBy("id", "desc")->first();
        return $latestRefreshToken->id === $this->id;
    }

    public function domain(): DomainModelRefreshToken
    {
        return DomainModelRefreshToken::create(
            ModelRefreshTokenId::create($this->id),
            ModelRefreshTokenExpiration::create(new Carbon($this->expiration)),
            ModelRefreshTokenToken::create($this->token),
            ModelId::create($this->model_id),
            ModelRefreshTokenCreatedAt::create(new Carbon($this->created_at)),
            ModelRefreshTokenUpdatedAt::create(new Carbon($this->updated_at))
        );
    }
}

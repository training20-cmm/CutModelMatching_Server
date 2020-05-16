<?php

namespace App;

use App\Domain\ModelAccessToken as DomainModelAccessToken;
use App\Domain\ModelAccessTokenCreatedAt;
use App\Domain\ModelAccessTokenExpiration;
use App\Domain\ModelAccessTokenId;
use App\Domain\ModelAccessTokenToken;
use App\Domain\ModelAccessTokenUpdatedAt;
use App\Domain\ModelId;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ModelAccessToken extends Model
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

    public function domain(): DomainModelAccessToken
    {
        return DomainModelAccessToken::create(
            ModelAccessTokenId::create($this->id),
            ModelAccessTokenExpiration::create(new Carbon($this->expiration)),
            ModelAccessTokenToken::create($this->token),
            ModelId::create($this->model_id),
            ModelAccessTokenCreatedAt::create(new Carbon($this->created_at)),
            ModelAccessTokenUpdatedAt::create(new Carbon($this->updated_at))
        );
    }
}

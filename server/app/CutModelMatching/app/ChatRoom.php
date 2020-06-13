<?php

namespace App;

use App\Model as AppModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatRoom extends Model
{

    protected $fillable = [
        "hairdresser_id", "model_id"
    ];

    public function hairdresser(): BelongsTo
    {
        return $this->belongsTo(Hairdresser::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(AppModel::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }
}

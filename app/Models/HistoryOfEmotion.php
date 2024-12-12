<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\EmotionEnum;

class HistoryOfEmotion extends Model
{
    protected $fillable = [
        'emotion',
        'workspace_id',
    ];

    protected $appends = ['translated_emotion'];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function getTranslatedEmotionAttribute(): string
    {
        return EmotionEnum::translate($this->emotion);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function summary()
    {
        return $this->hasOne(Summary::class);
    }

    public function historyOfEmotions()
    {
        return $this->hasMany(HistoryOfEmotion::class);
    }
}

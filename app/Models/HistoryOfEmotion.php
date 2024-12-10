<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryOfEmotion extends Model
{
    protected $fillable = [
        'emotion',
        'workspace_id',
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}

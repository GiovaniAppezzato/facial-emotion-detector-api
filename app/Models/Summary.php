<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable = [
        'workspace_id',
        'angry',
        'disgust',
        'fear',
        'happy',
        'sad',
        'surprise',
        'neutral',
        'total',
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}

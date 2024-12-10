<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\HistoryOfEmotion;
use App\Models\Summary;

class EmotionService
{
    public function summary(int $workspaceId)
    {
        return Summary::whereWorkspaceId($workspaceId)->first();
    }

    public function details(int $workspaceId)
    {
        return HistoryOfEmotion::whereWorkspaceId($workspaceId)->get();
    }

    public function increment(string $emotion, int $workspaceId): void
    {
        DB::transaction(function () use ($emotion, $workspaceId) {
            $summary = Summary::firstOrCreate([
                'workspace_id' => $workspaceId,
            ]);
    
            $summary->increment($emotion);
            
            $summary->increment('total');
    
            HistoryOfEmotion::create([
                'emotion' => $emotion,
                'workspace_id' => $workspaceId,
            ]);
        });
    }
}
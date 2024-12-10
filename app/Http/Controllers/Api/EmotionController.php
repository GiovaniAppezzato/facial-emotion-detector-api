<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEmotionRequest;
use App\Services\EmotionService;

class EmotionController extends Controller
{
    public function __construct(
        protected EmotionService $emotionService
    ) {}

    public function store(StoreEmotionRequest $request)
    {
        $this->emotionService->increment($request->emotion, $request->workspace_id);

        return response()->json([
            'message' => 'Emotion stored successfully',
        ]);
    }
}

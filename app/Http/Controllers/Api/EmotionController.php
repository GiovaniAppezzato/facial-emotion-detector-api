<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEmotionRequest;
use App\Services\EmotionService;

class EmotionController extends Controller
{
    public function __construct(
        protected EmotionService $emotionService
    ) {}

    public function index(Request $request)
    {
        return response()->json([
            'emotions' => $this->emotionService->summary($request->workspace_id),
        ]);
    }

    public function show(Request $request)
    {
        return response()->json([
            'emotion' => $this->emotionService->details($request->workspace_id),
        ]);
    }

    public function store(StoreEmotionRequest $request)
    {
        $this->emotionService->increment($request->emotion, $request->workspace_id);

        return response()->json([
            'message' => 'Emotion stored successfully',
        ]);
    }
}

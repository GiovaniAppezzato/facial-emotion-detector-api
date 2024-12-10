<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmotionController;

Route::prefix('/v1')->group(function () {
    Route::get('/emotion', [EmotionController::class, 'index']);
    Route::post('/emotion', [EmotionController::class, 'store']);
    Route::get('/emotion/details', [EmotionController::class, 'show']);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmotionController;

Route::prefix('/v1')->group(function () {
    Route::post('/emotion', [EmotionController::class, 'store']);
});

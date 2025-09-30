<?php

use App\Http\Controllers\API\AiController;
use App\Http\Controllers\API\AndroidController;
use App\Http\Controllers\API\DefectDataController;
use App\Http\Controllers\API\EspController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\InputController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/get-apk', [AndroidController::class, 'getApk']);
    Route::resource('input', InputController::class);
    Route::get('/esp', [EspController::class, 'index']);
    Route::resource('defect-data', DefectDataController::class);
    Route::post('ai-image', [AiController::class, 'checkImage']);
    Route::post('ai-train', [AiController::class, 'train']);
    Route::get('/defect-group', [GroupController::class, 'index']);

    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class);
    });
});

Route::get('/test', function (Request $request) {
    return response()->json([
        "result" => 'success'
    ]);
});

<?php

use App\Http\Controllers\API\AiController;
use App\Http\Controllers\API\AndroidController;
use App\Http\Controllers\API\DefectDataController;
use App\Http\Controllers\API\EspController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\InputController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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


    Route::get('/moex/securities', function () {
//        $response = Http::get('http://iss.moex.com/iss/securities.json');
//        $response = Http::get('https://iss.moex.com/iss/securities.json?group_by_filter=corporate_bond&group_by=type');
//        $response = Http::get('https://iss.moex.com/iss/securities.json?q=газпром');
//        $response = Http::get('https://iss.moex.com/iss/securities.json?securities.columns=secid,name');
//        $response = Http::get('https://iss.moex.com/iss/securities.json?iss.meta=off');
        $response = Http::get('https://iss.moex.com/iss/securities.json?iss.meta=off&start=500000&limit=10');
        return $response->json();
    });

    Route::get('/mmvb/candles', function (Request $request) {
        // Принимаем параметры из запроса
        $security = $request->input('security', 'SiZ4'); // значение по умолчанию
        $interval = $request->input('interval', 60);
        $from = $request->input('from', date('Y-m-d', strtotime('-7 days')));

        // Формируем URL для MOEX API
        $url = "https://iss.moex.com/iss/engines/futures/markets/forts/boards/RFUD/securities/{$security}/candles.json";

        // Делаем запрос с параметрами
        $response = Http::get($url, [
            'interval' => $interval,
            'from' => $from,
            'iss.meta' => 'off'
        ]);

        return $response->json();
    });
});

Route::get('/test', function (Request $request) {
    return response()->json([
        "result" => 'success'
    ]);
});

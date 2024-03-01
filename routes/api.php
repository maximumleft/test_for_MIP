<?php

use App\Http\Controllers\Api\PressureController;
use App\Http\Controllers\Api\RotationSpeedController;
use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\Api\TemperatureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'set'], function () {
    Route::post('/temp', [TemperatureController::class, 'setTemp']);
    Route::post('/pressure', [PressureController::class, 'setPressure']);
    Route::post('/rotation-speed', [RotationSpeedController::class, 'setRotationSpeed']);
});

Route::get('/params', [SensorController::class, 'getParams']);




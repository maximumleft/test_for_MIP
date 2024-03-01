<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PressureResource;
use App\Http\Resources\RotationSpeedResource;
use App\Http\Resources\TemperatureResource;
use App\Models\PressureSensor;
use App\Models\RotationSpeedSensor;
use App\Models\TemperatureSensor;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function getParams(Request $request): JsonResponse
    {
        $time = $request->input('time');

        match ($time) {
            'hour' => $timeAgo = Carbon::now()->subHour(),
            'day' => $timeAgo = Carbon::now()->subDay(),
            'week' => $timeAgo = Carbon::now()->subWeek(),
        };

        return response()->json([
            'status' => 'ok',
            'data' => [
                'temperature' => TemperatureResource::collection(
                    $this
                        ->paramsService
                        ->getTemperatureByTime($timeAgo)),
                'pressure' => PressureResource::collection(
                    $this
                        ->paramsService
                        ->getPressureByTime($timeAgo)),
                'rotation_speed' => RotationSpeedResource::collection(
                    $this
                        ->paramsService
                        ->getRotationSpeedByTime($timeAgo)),
            ],
        ]);
    }
}

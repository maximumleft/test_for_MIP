<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\graphResources\PressureResource;
use App\Http\Resources\graphResources\RotationSpeedResource;
use App\Http\Resources\graphResources\TemperatureResource;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function getParams(Request $request): JsonResponse
    {   //Достаем вариант сортировки из запроса
        $time = $request->input('time');
        //Если что-то пришло идем дальше, иначе выходим с соответствующим ответом
        if ($time) {
            /*В зависимости от варианта сортировки устанавливаем
              переменную равную текущему времени минус час/день/неделя
            */
            $result = match ($time) {
                'last_hour' => $timeAgo = Carbon::now()->subHour(),
                'last_day' => $timeAgo = Carbon::now()->subDay(),
                'last_month' => $timeAgo = Carbon::now()->subMonth(),
                default => 'non',
            };
            /*Если не попали в match, значит введенное значение
              не правильное и отдаем ответ с ошибкой
            */
            if ($result === 'non') {
                return response()->json(['status' => 'there is no such option for time']);
            } else {
                //Если все хорошо, возвращаем данные
                return response()->json([
                    'status' => 'ok',
                    'data' => [
                        'temperature' => TemperatureResource::collection(
                            $this
                                ->paramsService
                                ->getTemperatureByTime($timeAgo, $time)),
                        'pressure' => PressureResource::collection(
                            $this
                                ->paramsService
                                ->getPressureByTime($timeAgo, $time)),
                        'rotation_speed' => RotationSpeedResource::collection(
                            $this
                                ->paramsService
                                ->getRotationSpeedByTime($timeAgo, $time)),
                    ],
                ]);
            }
        } else {
            return response()->json(['status' => 'time not specified']);
        }
    }
}

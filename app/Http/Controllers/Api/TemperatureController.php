<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemperatureRequest;
use App\Http\Resources\TemperatureResource;
use App\Models\TemperatureSensor;
use Illuminate\Http\JsonResponse;

class TemperatureController extends Controller
{
    public function setTemp(TemperatureRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json([
            'status' => 'ok',
            'data' => TemperatureResource::make(TemperatureSensor::create($data))
        ]);
    }

}

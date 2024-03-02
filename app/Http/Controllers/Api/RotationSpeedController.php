<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RotationSpeedRequest;
use App\Http\Resources\createResources\RotationSpeedCreateResource;
use App\Models\RotationSpeedSensor;
use Illuminate\Http\JsonResponse;

class RotationSpeedController extends Controller
{
    public function setRotationSpeed(RotationSpeedRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json([
            'status' => 'ok',
            'data' => RotationSpeedCreateResource::make(RotationSpeedSensor::create($data))
        ]);
    }
}

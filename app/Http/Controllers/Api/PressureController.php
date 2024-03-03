<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PressureRequest;
use App\Http\Resources\createResources\PressureCreateResource;
use App\Models\PressureSensor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PressureController extends Controller
{
    public function setPressure(Request $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json([
            'status' => 'ok',
            'data' => PressureCreateResource::make(PressureSensor::create($data))
        ]);
    }
}

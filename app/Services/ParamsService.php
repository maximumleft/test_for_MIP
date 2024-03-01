<?php

namespace App\Services;

use App\Models\PressureSensor;
use App\Models\RotationSpeedSensor;
use App\Models\TemperatureSensor;
use Illuminate\Support\Collection;

class ParamsService
{
    public function getTemperatureByTime($timeAgo)
    {
        return TemperatureSensor::query()
            ->where('created_at', '>=', $timeAgo)
            ->get();
    }
    public function getPressureByTime($timeAgo)
    {
        return PressureSensor::query()
            ->where('created_at', '>=', $timeAgo)
            ->get();
    }
    public function getRotationSpeedByTime($timeAgo)
    {
        return RotationSpeedSensor::query()
            ->where('created_at', '>=', $timeAgo)
            ->get();
    }
}

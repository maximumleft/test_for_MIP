<?php

namespace App\Services;

use App\Models\PressureSensor;
use App\Models\RotationSpeedSensor;
use App\Models\TemperatureSensor;

class ParamsService
{
    public function getTemperatureByTime($timeAgo, $time): \Illuminate\Database\Eloquent\Collection|array
    {
        $results = TemperatureSensor::query()
            ->where('created_at', '>=', $timeAgo)
            ->get();
        $this->callFunction($results, $time);
        return $results;
    }

    public function getPressureByTime($timeAgo, $time): \Illuminate\Database\Eloquent\Collection|array
    {
        $results = PressureSensor::query()
            ->where('created_at', '>=', $timeAgo)
            ->get();
        $this->callFunction($results, $time);
        return $results;
    }

    public function getRotationSpeedByTime($timeAgo, $time): \Illuminate\Database\Eloquent\Collection|array
    {
        $results = RotationSpeedSensor::query()
            ->where('created_at', '>=', $timeAgo)
            ->get();
        $this->callFunction($results, $time);
        return $results;
    }

    private function getMinutes($results): mixed
    {
        foreach ($results as $result) {
            $result->created_time = intval(date('i', strtotime($result->created_at)));
        }
        return $results;
    }

    private function getHours($results): mixed
    {
        foreach ($results as $result) {
            $result->created_time = intval(date('H', strtotime($result->created_at)));
        }
        return $results;
    }

    private function getDays($results): mixed
    {
        foreach ($results as $result) {
            $result->created_time = date('d-m', strtotime($result->created_at));
        }
        return $results;
    }

    private function callFunction($results, $time): void
    {
        match ($time) {
            'last_hour' => $this->getMinutes($results),
            'last_day' => $this->getHours($results),
            'last_month' => $this->getDays($results),
            default => 'non',
        };
    }
}

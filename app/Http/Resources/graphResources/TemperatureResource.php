<?php

namespace App\Http\Resources\graphResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TemperatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'y_axis' => $this->T,
            'x_axis' => $this->created_time,
        ];
    }
}

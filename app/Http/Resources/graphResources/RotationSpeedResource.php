<?php

namespace App\Http\Resources\graphResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RotationSpeedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'y_axios' => $this->value,
            'x_axios' => $this->created_time,
        ];
    }

}

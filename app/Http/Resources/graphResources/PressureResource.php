<?php

namespace App\Http\Resources\graphResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PressureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'y_axios' => $this->P,
            'x.axios' => $this->created_time,
        ];
    }


}

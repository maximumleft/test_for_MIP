<?php

namespace App\Http\Resources\createResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PressureCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'pressure' => $this->value,
        ];
    }


}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarRentalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'car' => CarResource::make($this->whenLoaded('car')),
            'days' => $this->days,
            'insurance' => $this->insurance,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarDetailsResource extends JsonResource
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
            'car' => CarResource::make($this->whenLoaded('car')),
            'engine_type' => $this->engine_type,
            'horse_power' => $this->horse_power,
            'drivetrain' => $this->drivetrain,
            'top_speed' => $this->top_speed,
            'acceleration' => $this->acceleration,
            'body_style' => $this->body_style,
            'number_of_doors' => $this->number_of_doors,
            'weight' => $this->weight,
            'weight_unit' => $this->weight_unit,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'tire_size' => $this->tire_size,
            'features' => $this->features

        ];
    }
}

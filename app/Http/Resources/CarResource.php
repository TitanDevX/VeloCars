<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,
            'mileage' => $this->mileage,
            'vin' => $this->vin,
            'buy_price' => $this->buy_price,
            'rent_price' => $this->rent_price,
            'type' => $this->type,
            'used' => $this->used,
            'available_for_rent' => $this->available_for_rent,
            'details' => $this->details()->exists() ? CarDetailsResource::make($this->whenLoaded('details')) : null,
            'sold_to' => $this->soldTo()->exists() ? UserResource::make($this->whenLoaded('soldTo')) : null,
           'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

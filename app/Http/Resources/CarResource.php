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
            'rent_daily_rate' => $this->rent_daily_rate,
            'rent_weekly_rate' => $this->rent_weekly_rate,
            'min_rental_days' => $this->min_rental_days,
            'type' => $this->type,
            'used' => $this->used,
            'for_rent' => $this->for_rent,
            'details' => $this->details()->exists() ? CarDetailsResource::make($this->whenLoaded('details')) : null,
            'sold_to' => $this->soldTo()->exists() ? UserResource::make($this->whenLoaded('soldTo')) : null,
           'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

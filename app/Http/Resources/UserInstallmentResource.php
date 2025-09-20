<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInstallmentResource extends JsonResource
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
            'plan' => $this->plan,
            'car' => CarResource::make($this->whenLoaded('car')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'next_invoice_date' => $this->next_invoice_date,
            'state' => $this->state
        ];
    }
}

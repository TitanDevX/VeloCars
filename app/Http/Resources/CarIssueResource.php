<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarIssueResource extends JsonResource
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
            'title' => $this->title,
            'car' => CarResource::make($this->whenLoaded('car')),
            'state' => $this->state,
            'priority' => $this->priority,
            'fixer' => UserResource::make($this->whenLoaded('fixer')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

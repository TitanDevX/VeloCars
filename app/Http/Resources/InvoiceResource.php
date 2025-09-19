<?php

namespace App\Http\Resources;

use App\Models\Car;
use App\Models\CarRental;
use App\Models\UserInstallment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'payable' => $this->whenLoaded('payable', function($loaded) {

                if($this->payable_type === Car::class){
                    return CarResource::make($loaded);
                }else if($this->payable_type === UserInstallment::class){
                    return UserInstallment::make($loaded);
                }else if($this->payable_type === CarRental::class){
                    return CarRental::make($loaded);
                }
            }),
            'amount' => $this->amount,
            'state' => $this->state,
            'user' => UserResource::make($this->whenLoaded('user')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

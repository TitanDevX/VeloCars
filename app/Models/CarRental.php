<?php

namespace App\Models;

use App\Enums\RentalStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarRental extends Model
{
      /** @use HasFactory<\Database\Factories\CarDetailFactory> */
      use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'state' => RentalStateEnum::class,
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function renter(){
        return $this->belongsTo(User::class,"renter_id");
    }
    public function invoices(){
        return $this->morphMany(Invoice::class,'payable');
    }

}

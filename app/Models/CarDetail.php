<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarDetail extends Model
{
    /** @use HasFactory<\Database\Factories\CarDetailFactory> */
      use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function car(){
        return $this->belongsTo(Car::class);
    }


}

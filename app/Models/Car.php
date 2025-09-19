<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function details(){
        return $this->hasOne(CarDetail::class);
    }
    public function soldTo(){
        return $this->belongsTo(User::class, 'sold_to_user_id');
    }

    public function invoices(){
        return $this->morphMany(Invoice::class,'payable');
    }
}

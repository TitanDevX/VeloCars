<?php

namespace App\Models;

use App\Enums\InstallmentStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInstallment extends Model
{
    /** @use HasFactory<\Database\Factories\UserInstallmentFactory> */
    /** @use HasFactory<\Database\Factories\CarDetailFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'state' => InstallmentStateEnum::class,
    ];
    public function plan()
    {
        return $this->belongsTo(InstallmentPlan::class);
    }
    public function installmentPlan()
    {
        return $this->belongsTo(InstallmentPlan::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function invoices(){
        return $this->morphMany(Invoice::class,'payable');
    }
}

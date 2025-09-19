<?php

namespace App\Models;

use App\Enums\InvoiceStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    /** @use HasFactory<\Database\Factories\CarDetailFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'state' => InvoiceStateEnum::class,
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payable(){
        return $this->morphTo();
    }
}

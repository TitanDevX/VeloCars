<?php

namespace App\Models;

use App\Enums\InterestTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstallmentPlan extends Model
{
  /** @use HasFactory<\Database\Factories\CarDetailFactory> */
  use HasFactory, SoftDeletes;

  protected $casts = [
    'interest_type' => InterestTypeEnum::class,
  ];

  protected $guarded = ['id', 'created_at', 'updated_at'];
}

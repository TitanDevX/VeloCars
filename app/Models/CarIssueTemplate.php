<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarIssueTemplate extends Model
{
  /** @use HasFactory<\Database\Factories\CarDetailFactory> */
  use HasFactory, SoftDeletes;
  protected $casts = [
    'priority' => CarIssuePriorityEnum::class,
  ];

  protected $guarded = ['id', 'created_at', 'updated_at'];
}

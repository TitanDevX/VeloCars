<?php

namespace App\Models;

use App\Enums\CarIssuePriorityEnum;
use App\Enums\CarIssueStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarIssue extends Model
{
  /** @use HasFactory<\Database\Factories\CarDetailFactory> */
  use HasFactory, SoftDeletes;

  protected $guarded = ['id', 'created_at', 'updated_at'];

  protected $casts = [
    'state' => CarIssueStatusEnum::class,
    'priority' => CarIssuePriorityEnum::class,
  ];

  public function fixer()
  {

    return $this->belongsTo(User::class, 'fixer_id');
  }
  public function car()
  {
    return $this->belongsTo(Car::class);
  }

}

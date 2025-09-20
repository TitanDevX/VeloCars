<?php

namespace App\Models;

use App\Enums\UserNotifSubEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNoficationSubscription extends Model
{
    /** @use HasFactory<\Database\Factories\UserNoficationSubscriptionFactory> */
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];

    protected $casts = [
        'type' => UserNotifSubEnum::class,
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

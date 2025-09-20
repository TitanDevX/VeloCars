<?php

namespace App\Services;

use App\Enums\UserNotifSubEnum;
use App\Models\User;
use Closure;


class UserNotificationSubscriptionService
{


      public function isSubscribed(User $user, UserNotifSubEnum $type)
      {
            $subs = $user->notificationSubscriptions;
            foreach ($subs as $sub) {
                  if ($sub->type == UserNotifSubEnum::ALL || $sub->type == $type) {
                        return true;
                  }
            }
            return false;
      }
      public function forEachSubscribedUser(UserNotifSubEnum $type, callable $consumer)
      {
            User::whereHas('notificationSubscriptions', function ($query) use ($type) {
                  $query->whereIn('type', [$type->value, 2]);
            })->get()->each($consumer);
      }

}
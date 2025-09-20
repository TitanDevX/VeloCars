<?php

namespace App\Services;

use App\Enums\UserNotifSubEnum;
use App\Models\User;


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

}
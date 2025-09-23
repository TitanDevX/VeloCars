<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserInstallment;
use Illuminate\Auth\Access\Response;

class UserInstallmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('userinstallment.view');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserInstallment $userInstallment): bool
    {
        return $user->can('userinstallment.view') || ($user->can('userinstallment.own.view') && $userInstallment->user_id == $user->id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, ?User $targetUser): bool
    {
        return $user->can('userinstallment.create') ||
         ($targetUser && $targetUser->id == $user->id && $user->can('userinstallment.own.create'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserInstallment $userInstallment): bool
    {
        return $user->can('userinstallment.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserInstallment $userInstallment): bool
    {
         return $user->can('userinstallment.delete');
    }

}

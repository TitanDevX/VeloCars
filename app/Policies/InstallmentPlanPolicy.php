<?php

namespace App\Policies;

use App\Models\InstallmentPlan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InstallmentPlanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('installmentplan.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, InstallmentPlan $installmentPlan): bool
    {
        return $user->can('installmentplan.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('installmentplan.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, InstallmentPlan $installmentPlan): bool
    {
        return $user->can('installmentplan.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, InstallmentPlan $installmentPlan): bool
    {
        return $user->can('installmentplan.delete');
    }

    
}

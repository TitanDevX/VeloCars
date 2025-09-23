<?php

namespace App\Policies;

use App\Models\CarIssue;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarIssuePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
          return $user->can('carissue.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CarIssue $carIssue): bool
    {
        return $user->can('carissue.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('carissue.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CarIssue $carIssue): bool
    {
        return $user->can('carissue.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CarIssue $carIssue): bool
    {
       return $user->can('carissue.delete');
    }

  
}

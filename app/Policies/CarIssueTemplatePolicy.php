<?php

namespace App\Policies;

use App\Models\CarIssueTemplate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarIssueTemplatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('carissuetemplate.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CarIssueTemplate $carIssueTemplate): bool
    {
         return $user->can('carissuetemplate.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
      return $user->can('carissuetemplate.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CarIssueTemplate $carIssueTemplate): bool
    {
      return $user->can('carissuetemplate.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CarIssueTemplate $carIssueTemplate): bool
    {
        return $user->can('carissuetemplate.delete');
    }

  
}

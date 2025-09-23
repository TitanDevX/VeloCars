<?php

namespace App\Policies;

use App\Models\CarDetail;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarDetailPolicy
{
    

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
         return $user->can('cardetail.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
           return $user->can('cardetail.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
           return $user->can('cardetail.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
            return $user->can('cardetail.delete');
    }

   
}

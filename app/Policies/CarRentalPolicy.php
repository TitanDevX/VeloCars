<?php

namespace App\Policies;

use App\Models\CarRental;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarRentalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('rental.index');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CarRental $carRental): bool
    {
        return $user->can('rental.view') || $carRental->renter_id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, ?User $targetUser): bool
    {
         return $user->can('rental.create') 
         || ($targetUser && $targetUser->id == $user->id && $user->can('rental.own.create'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CarRental $carRental): bool
    {
        return $user->can('rental.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CarRental $carRental): bool
    {
        return $user->can('rental.delete');
    }

    
}

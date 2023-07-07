<?php

namespace App\Policies;

use App\Models\SessionDeDepot;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SessionDeDepotPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool //listes
    {
        return  (auth()->user()->role->value === 'administrateur')  ;
        // return  true ;
      
    }

    // mazalou 4 h w toufa session : exemple   

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SessionDeDepot $sessionDeDepot): bool
    {
        return  (auth()->user()->role->value === 'administrateur')  ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return  (auth()->user()->role->value === 'administrateur')  ;
        return true ;
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SessionDeDepot $sessionDeDepot): bool
    {
        return  (auth()->user()->role->value === 'administrateur')  ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SessionDeDepot $sessionDeDepot): bool
    {
        return  (auth()->user()->role->value === 'administrateur')  ;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SessionDeDepot $sessionDeDepot): bool
    {
       return  (auth()->user()->role->value === 'administrateur')  ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SessionDeDepot $sessionDeDepot): bool
    {
        //
    }
}

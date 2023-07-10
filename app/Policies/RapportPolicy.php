<?php

namespace App\Policies;

use App\Models\Etudiant;
use App\Models\Rapport;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RapportPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return  (auth()->user()->role->value === 'etudiant')  ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Rapport $rapport): bool
    {
        return  (auth()->user()->role->value === 'etudiant')  ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

        // pas la peine de creer un deuxiéme rapport  pour le meme stage
        

        return  (auth()->user()->role->value === 'etudiant')   ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Rapport $rapport): bool
    {
        return  (auth()->user()->role->value === 'etudiant')  ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Rapport $rapport): bool
    {
        return  (auth()->user()->role->value === 'etudiant')  ;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Rapport $rapport): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Rapport $rapport): bool
    {
        //
    }
}

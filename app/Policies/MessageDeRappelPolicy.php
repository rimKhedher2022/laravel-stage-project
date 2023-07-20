<?php

namespace App\Policies;

use App\Models\MessageDeRappel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MessageDeRappelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return  (auth()->user()->role->value === 'administrateur' || auth()->user()->role->value === 'etudiant' )  ;
    }

    
    public function adminMessages(User $user): bool
    {
        return  (auth()->user()->role->value === 'administrateur' || auth()->user()->role->value === 'enseignant')   ;
    }


    public function etudiantMessages(User $user): bool
    {
        return  auth()->user()->role->value === 'etudiant'   ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MessageDeRappel $messageDeRappel): bool
    {
        return  (auth()->user()->role->value === 'administrateur' || auth()->user()->role->value === 'enseignant' )   ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return  (auth()->user()->role->value === 'administrateur')  ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MessageDeRappel $messageDeRappel): bool
    {
        return  (auth()->user()->role->value === 'administrateur' || auth()->user()->role->value === 'enseignant')  ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MessageDeRappel $messageDeRappel): bool
    {
        return  (auth()->user()->role->value === 'administrateur' || auth()->user()->role->value === 'enseignant')  ;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MessageDeRappel $messageDeRappel): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MessageDeRappel $messageDeRappel): bool
    {
        //
    }
}

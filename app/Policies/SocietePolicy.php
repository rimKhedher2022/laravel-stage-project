<?php

namespace App\Policies;

use App\Models\Etudiant;
use App\Models\Societe;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SocietePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
       return (auth()->user()->role->value === 'administrateur') or (auth()->user()->role->value === 'etudiant');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Societe $societe): bool
    {
        if(auth()->user()->role->value === 'etudiant')
        {
        $etudiant = Etudiant::where('user_id',$user->id)->first(); // 4
        $stage_societe_ids =  $etudiant?->stages->pluck('societe_id')->toArray() ;  
        return in_array($societe->id , $stage_societe_ids);
        // array : user_id
        }
        elseif(auth()->user()->role->value === 'administrateur')
        {
            return true ;
        }
        return false;
      
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Societe $societe): bool
    {
        $etudiant = Etudiant::where('user_id',$user->id)->first(); // 4
        $stage_societe_ids =  $etudiant->stages->pluck('societe_id')->toArray() ;  // array : user_id

       return in_array($societe->id , $stage_societe_ids)  or (auth()->user()->role->value === 'administrateur');
   
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Societe $societe): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Societe $societe): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Societe $societe): bool
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Enums\RoleType;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return (auth()->user()->role->value === 'etudiant') ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Stage $stage): bool
    {
        $stage_etudiant_ids = $stage->etudiants->pluck('user_id')->toArray() ;  // array : user_id
        // dd(in_array($user->id,$stage_etudiant_ids));

        return in_array($user->id,$stage_etudiant_ids)  ;
        
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
    public function update(User $user, Stage $stage): bool
    {
        // dd($stage->etudiants());
        // return $user->id === $stage->user_id;
       $stage_etudiant_ids = $stage->etudiants->pluck('user_id')->toArray() ;  // array : user_id
        // dd(in_array($user->id,$stage_etudiant_ids));

        return in_array($user->id,$stage_etudiant_ids)  ;
      
    }

    public function affecter (User $user, Stage $stage): bool
    {
       
        return  (auth()->user()->role->value === 'administrateur')  ;
      
    }

    public function stagesConsultesParAdministrateur (User $user): bool
    {
       
        return  (auth()->user()->role->value === 'administrateur')  ;
      
    }

    public function stagesConsultesParEnseignant (User $user): bool
    {
       
        return  (auth()->user()->role->value === 'enseignant')  ;
      
    }

    public function enseignantQuiConsulte (User $user, Stage $stage): bool
    {
        $stage_enseignant_ids = $stage->enseignants->pluck('user_id')->toArray() ;  
        return in_array($user->id,$stage_enseignant_ids)  && (auth()->user()->role->value === 'enseignant')  ;
      
    }
   

    public function stagesConsultesParEtudiant (User $user , Stage $stage): bool
    {
       
        $stage_etudiant_ids = $stage->etudiants->pluck('user_id')->toArray() ;  
        return in_array($user->id,$stage_etudiant_ids)  && (auth()->user()->role->value === 'etudiant') ;
      
      
    }
    public function stagesConsultesParAdmin (User $user , Stage $stage): bool
    { 
        return auth()->user()->role->value === 'administrateur' ;
    }

    public function stageAvalider (User $user): bool
    {
       
        return  (auth()->user()->role->value === 'enseignant')  ;
      
    }


    public function choisirDateSoutenance(User $user, Stage $stage): bool
    {
        // dd($stage->etudiants());
        // return $user->id === $stage->user_id;
       $stage_enseignant_ids = $stage->enseignants->pluck('user_id')->toArray() ;  // array : user_id
        // dd(in_array($user->id,$stage_etudiant_ids));

        return in_array($user->id,$stage_enseignant_ids)  && ($stage->type=='ouvrier' || $stage->type=='technicien' )  ;
      
    }

    
    public function choisirDateSoutenancePfeSfe(User $user, Stage $stage): bool
    {
       

        return (auth()->user()->role->value === 'administrateur')  ;
    }


   

  
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Stage $stage): bool
    {
        $stage_etudiant_ids = $stage->etudiants->pluck('user_id')->toArray() ;  // array : user_id
        // dd(in_array($user->id,$stage_etudiant_ids));

        return in_array($user->id,$stage_etudiant_ids) ; // true
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Stage $stage): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Stage $stage): bool
    {
        //
    }
}

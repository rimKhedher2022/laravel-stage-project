<?php

namespace App\Http\Controllers\Stage;

use App\Enums\RoleType;
use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Http\Requests\StageStoreRequest;
use App\Http\Requests\StageUpdateRequest;
use App\Models\Enseignant;
use App\Models\EnseignantStage;
use App\Models\Etudiant;
use App\Models\EtudiantStage;
use App\Models\Stage;
use App\Models\User;
use App\Notifications\StageAffecteeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class UpdateController extends Controller
{
    public function update(StageUpdateRequest $request  , $id) {
        $stage = Stage::find($id);
       
        $this->authorize('update', $stage );  // admin aussi peut modifier lorsqu'il choisit l'enseignant

        $stage->update(
        //     [
        //     'type'=>$request->type,
        //     'sujet'=>$request->sujet,
        //     'date_debut'=>$request->date_debut,
        //     'date_fin'=>$request->date_fin,
        //     'societe_id'=>$request->societe_id,
        //     'etat'=>$request->etat,
        //     'date_soutenance'=>$request->date_soutenance,
        // ]
        $request->all()  
    );
// sans binome 
// ajout un binome
// modifier le binome
// supprimer un binome
// setAttribut : binomeId : Controller
// si le nb total des stagaires est >= 2 on va annuler la creation  / 2 éme condition = le binome <> du etudiant connecté

$etudiants_stage = $stage->etudiants ;
$id_auth = Etudiant::where('user_id',auth()->id())->first()->id; //2
$binome = $etudiants_stage->filter(function  ($value, $key) use($id_auth) {
    return $value->id != $id_auth;
    
})->first(); 
// dd ($request->etudiant_id); // ok

    if ($binome?->id !== $request->etudiant_id  && $request->etudiant_id !== null) 
    {
         if($binome){
           // $etudiants_stage->detach($binome->id) ; 
            // $etudiants_stage->authors()->detach($authorId);
            $stage->etudiants()->detach($binome->id) ;// supprimer l'ancien binome
         }
        if($request->etudiant_id !== '0'){
            EtudiantStage::create([  // 
                'stage_id'=>$stage->id,
                'etudiant_id'=> $request->etudiant_id, // le binome
                ]);
        }   
    }
    return back()->with('succes', 'stage mis a jour . ');
}

public function affecter (Request $request  , $id) {

    $stage = Stage::find($id);
    // dd($stage->enseignants);
    $this->authorize('affecter', $stage );  // admin aussi peut modifier lorsqu'il choisit l'enseignant
  
        $stage_enseignant_id =  $stage->enseignants->pluck('id')->toArray() ; // roles
      

       // 2 opérations kol role enseigant wa7dou $stage->enseignants->pluck('id')->toArray() ; 7sb el role : les ids_enseignant_encadrant ....

         if($request->enseignant_id !== '0' ){ 
            if(!empty($stage_enseignant_id)){ // l'ancien enseignant
          
                $stage->enseignants()->detach($stage_enseignant_id) ; // suprimer l'enseignant
             }

            EnseignantStage::create([  // 
                 'stage_id'=>$stage->id,
                 'enseignant_id'=> $request->enseignant_id, // l'enseignant
                 'role'=> 'enseignant'
                 ]);

              $stage->update([
                    'etat'=> StageEtat::AFFECTE
              ]);


            //   $etudiant->stages->pluck('societe_id')->toArray() ;
              $enseignant = Enseignant::where('id',$request->enseignant_id)->first() ; 
              if ($enseignant)
              {
                $user_enseignant = User::where('id',$enseignant->user_id)->first()  ; // 4  // l'id_user du l'enseignant
               

              
                // Notification::send($user_enseignant,new StageAffecteeNotification($stage)) ; 
                $les_etudiants = $stage->etudiants; 
                // foreach ( $les_etudiants as $etudiant)
                // {
                //     $user_etudiant = User::where('id',$etudiant->user_id)->first()  ;
                //     Notification::send($user_etudiant,new StageAffecteeNotification($stage)) ; 

                // }

              }
            
         }
         
         else  { /// sup tous les enseignant --> 0

            if(!empty($stage_enseignant_id)){
          
                $stage->enseignants()->detach($stage_enseignant_id) ; // suprimer l'enseignant
                $stage->update([
                    'etat'=> StageEtat::DEPOSE
              ]);
             }
         }

         
        return back()->with('succes', 'enseignant affecté . ');

    }
        

        public function affecterEncadrant (Request $request  , $id)
        {

            $stage = Stage::find($id);
   
            $this->authorize('affecter', $stage );
           
            if ($request->encadrant_id !== '0')
            {
                $role = 'encadrant';
                $teachersWithRole3 = $stage->enseignants->filter(function ($enseignant) use ($role) {
                    return $enseignant->pivot->role === $role;
                })->pluck('id')->toArray();
        
                // dd(in_array($request->president_id, $teachersWithRole2));
                     // x : encadrant and y : co-encadrant , 
                     // x : co-encadrant and y : encadrant  , 
                    if($teachersWithRole3 && !(in_array($request->encadrant_id, $teachersWithRole3)))
                    {
                        $stage->enseignants()->wherePivot('role',$role)->detach($teachersWithRole3) ; // suprimer l'enseignant
                        EnseignantStage::create([  // 
                            'stage_id'=>$stage->id,
                            'enseignant_id'=> $request->encadrant_id, // l'enseignant
                            'role'=> 'encadrant'
                            
                            ]);
                            // dd('create encadrant');
                            // dd($test);

                    }
            
                    $test=null;
                    if(!$teachersWithRole3){
                            EnseignantStage::create([  // 
                            'stage_id'=>$stage->id,
                            'enseignant_id'=> $request->encadrant_id, // l'enseignant
                            'role'=> 'encadrant'
                            ]);
                            // dd($test);
                    }
               
               
                   
                  
            }
        
            elseif ($request->encadrant_id == '0'){
                $role = 'encadrant';
                $teachersWithRole3 =$stage->enseignants->filter(function ($enseignant) use ($role) {
                    return $enseignant->pivot->role === $role;
                })->pluck('id')->toArray();
        
                if($teachersWithRole3)
                {
                    $stage->enseignants()->wherePivot('role',$role)->detach($teachersWithRole3) ; // suprimer l'enseignant
                }
               
        
            }
        

           
            if ($request->co_encadrant_id !== '0')
            {

                $role = 'co-encadrant';
                $teachersWithRole4 = $stage->enseignants->filter(function ($enseignant) use ($role) {
                    return $enseignant->pivot->role === $role;
                })->pluck('id')->toArray();
        
                // dd(in_array($request->president_id, $teachersWithRole2));
        
                if($teachersWithRole4 && !(in_array($request->co_encadrant_id, $teachersWithRole4)))
                {
                    // dd($teachersWithRole4); // id 
                    $stage->enseignants()->wherePivot('role',$role)->detach($teachersWithRole4) ; // suprimer l'enseignant
                        EnseignantStage::create([  // 
                        'stage_id'=>$stage->id,
                        'enseignant_id'=> $request->co_encadrant_id, // l'enseignant
                        'role'=> 'co-encadrant'

                        ]);
                        // dd($test);
                }
        
                if(!$teachersWithRole4){
                    EnseignantStage::create([  // 
                        'stage_id'=>$stage->id,
                        'enseignant_id'=> $request->co_encadrant_id, // l'enseignant
                        'role'=> 'co-encadrant'
                        ]);
                }
               
               
               
                  
            }
        
            elseif ($request->co_encadrant_id == '0'){
                $role = 'co-encadrant';
                $teachersWithRole4 =$stage->enseignants->filter(function ($enseignant) use ($role) {
                    return $enseignant->pivot->role === $role;
                })->pluck('id')->toArray();
        
                if($teachersWithRole4)
                {
                    $stage->enseignants()->detach($teachersWithRole4) ; // suprimer l'enseignant
                }
               
        
            }
        
            $stage->update([
                'etat'=> StageEtat::AFFECTE_ENCADRANT
          ]);

            return back()->with('succes', 'encadrant(s) affecté(s) avec succés . ');


        }
        



public function affecterJury (Request $request  , $id)
 {
    $stage = Stage::find($id);
   
    $this->authorize('affecter', $stage );
   

    

  
  


    if ($request->president_id !== '0')
    {
        $role = 'president';
        $teachersWithRole1 = $stage->enseignants->filter(function ($enseignant) use ($role) {
            return $enseignant->pivot->role === $role;
        })->pluck('id')->toArray();

        // dd(in_array($request->president_id, $teachersWithRole2));

        if($teachersWithRole1 && !(in_array($request->president_id, $teachersWithRole1)))
        {
            $stage->enseignants()->wherePivot('role',$role)->detach($teachersWithRole1) ; // suprimer l'enseignant
            EnseignantStage::create([  // 
                'stage_id'=>$stage->id,
                'enseignant_id'=> $request->president_id, // l'enseignant
                'role'=> 'president'
                ]);
        }

        if(!$teachersWithRole1){
            EnseignantStage::create([  // 
                'stage_id'=>$stage->id,
                'enseignant_id'=> $request->president_id, // l'enseignant
                'role'=> 'president'
                ]);
        }
       
       
       
          
    }

    elseif ($request->president_id == '0'){
        $role = 'president';
        $teachersWithRole1 = $stage->enseignants->filter(function ($enseignant) use ($role) {
            return $enseignant->pivot->role === $role;
        })->pluck('id')->toArray();

        if($teachersWithRole1)
        {
            $stage->enseignants()->detach($teachersWithRole1) ; // suprimer l'enseignant
        }
       

    }

    if ($request->rapporteur_id !== '0')
    {
        $role = 'rapporteur';
        $teachersWithRole2 = $stage->enseignants->filter(function ($enseignant) use ($role) {
            return $enseignant->pivot->role === $role;
        })->pluck('id')->toArray();

        // dd(in_array($request->rapporteur_id, $teachersWithRole2));

        if($teachersWithRole2 && !(in_array($request->rapporteur_id, $teachersWithRole2)))
        {
            $stage->enseignants()->wherePivot('role',$role)->detach($teachersWithRole2) ; // suprimer l'enseignant
            EnseignantStage::create([  // 
                'stage_id'=>$stage->id,
                'enseignant_id'=> $request->rapporteur_id, // l'enseignant
                'role'=> 'rapporteur'
                ]);
        }

        if(!$teachersWithRole2){
            EnseignantStage::create([  // 
                'stage_id'=>$stage->id,
                'enseignant_id'=> $request->rapporteur_id, // l'enseignant
                'role'=> 'rapporteur'
                ]);
        }
       
       
       
          
    }

    elseif ($request->rapporteur_id == '0'){
        $role = 'rapporteur';
        $teachersWithRole2 = $stage->enseignants->filter(function ($enseignant) use ($role) {
            return $enseignant->pivot->role === $role;
        })->pluck('id')->toArray();

        if($teachersWithRole2)
        {
            $stage->enseignants()->detach($teachersWithRole2) ; // suprimer l'enseignant
        }
       

    }


    $stage->update([
        'etat'=> StageEtat::AFFECTE_J
  ]);
  
  $enseignants_responsables = $stage->enseignants ; 
  


    return back()->with('succes', 'les enseignants choisis avec succes.');

 }
        



public function choisirSoutenance(Request $request  , $id){
    $stage = Stage::find($id);

    $stage->update([
        'date_soutenance'=> $request->date_soutenance
  ]);

    return redirect('/stages')->with('message', 'date soutenance choisie avec succés. Veuillez valider le stage aprés la soutenanace du stagiaire ');
}

public function valider(Request $request  , $id){
    $stage = Stage::find($id);

    $stage->update([
        'etat'=> StageEtat::VALIDE
  ]);

   return back()->with('message', 'stage validé avec succés ');
}

    public function annulerValidation(Request $request  , $id){
        $stage = Stage::find($id);
        $stage->update([
            'etat'=> StageEtat::CORRIGE
        ]);

        return back()->with('message', 'annulation de validation');
    }


}

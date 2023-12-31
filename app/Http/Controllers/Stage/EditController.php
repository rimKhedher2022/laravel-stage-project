<?php

namespace App\Http\Controllers\Stage;

use App\Enums\RoleType;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\EtudiantStage;
use App\Models\Societe;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
   public function edit($id)
   {
    $stage = Stage::find($id);
    $enseignants = Enseignant::all();
   
  //  $enseignants = User::where('role',RoleType::Enseignant)->get(); // 4
    $this->authorize('view', $stage );
    $id_auth = Etudiant::where('user_id',auth()->id())->first()->id; //2  
   //  $etudiants_list = Etudiant::where('user_id','<>',auth()->id())->get();
    $etudiants_stage = $stage->etudiants; // 2 et 3
  
    // $etudiants = Etudiant::where('user_id', '!=', auth()->id())->get()  ;  // que les etudiants <> du l'etudiant connecté


    $loggedInStudent = Etudiant::where('user_id', auth()->id())->first();
    $niveau = $loggedInStudent->niveau ; 
    $diplôme = $loggedInStudent->diplôme ; 
    $societes = Societe::where('validation_state','approved by admin')->get() ; 

    $etudiants = Etudiant::where('user_id', '!=', auth()->id())
    ->where('niveau', $loggedInStudent->niveau)
    ->where('diplôme', $loggedInStudent->diplôme)
    ->where('specialite', $loggedInStudent->specialite)
    ->get() ;  // pour le binome

    $binome = $etudiants_stage->filter(function  ($value, $key) use($id_auth) {
      return $value->id != $id_auth;
      
  })->first();  // 
  // $enseignants_stage = $stage->enseignants() ; // les enseignants responsable d'un stage
  // $enseignant_responsable = $enseignants_stage->first(); 

  // dd ($stage->enseignants) ;


    // $societes = Societe::all();
    return  view('pages.edit-stage',['stage' => $stage,
    'societes' => $societes , 
    'etudiants' => $etudiants,
    'etudiants_stage'=> $etudiants_stage ,
    'id_auth'=>$id_auth , 
    'binome'=>$binome , 
    // 'enseignant_responsable' => $enseignant_responsable,
    // 'enseignants' => $enseignants
   ]);
   }

   public function affecterEnseignant($id)
   {
              $stage = Stage::find($id);
              $enseignants = Enseignant::all();
          $this->authorize('affecter', $stage );  // que l'admin peut voir la page d'affectation
 
                        $enseignants_stage = $stage->enseignants; // les enseignants responsable d'un stage
                        $enseignant_responsable = $enseignants_stage->first();    
                        return  view('pages.affecter-enseigant-stage-ete',['stage' => $stage,
                    
                              'enseignant_responsable' => $enseignant_responsable,
                              'enseignants' => $enseignants,
                              'enseignants_stage' => $enseignants_stage , 
                    ]);
   }
   public function affecterEncadrant($id)
   {
 
              $stage = Stage::find($id);
              $this->authorize('affecter', $stage ); // que l'admin peut voir la page d'affectation
              $enseignants = Enseignant::all();
               
 
                        $enseignants_stage = $stage->enseignants; // les enseignants responsable d'un stage
             
                        $encadrant_responsable = null;
                        $co_encadrant_responsable = null;

                            foreach ($enseignants_stage as $enseignant)

                        {

                            if ($enseignant->pivot->role == 'encadrant')
                            {
                                $encadrant_responsable = $enseignant ; 
                            }

                              elseif ($enseignant->pivot->role == 'co-encadrant')   
                            {
                              $co_encadrant_responsable = $enseignant ; 
                            }
                    
                     

                        }

                        return  view('pages.affecter-encadrant-stage-pfe-sfe',['stage' => $stage,
                    
                              'encadrant_responsable' => $encadrant_responsable,
                              'co_encadrant_responsable'=> $co_encadrant_responsable,
                              'enseignants' => $enseignants,
                              'enseignants_stage' => $enseignants_stage , 
                    ]);
   }
   public function affecterJury($id)
   {
              $stage = Stage::find($id);
              $enseignants = Enseignant::all();
               $this->authorize('affecter', $stage );  // que l'admin peut voir la page d'affectation
 
                        $enseignants_stage = $stage->enseignants; // les enseignants responsable d'un stage
                        $enseignant_responsable = $enseignants_stage->first(); 
                            $rapporteur = null;
                            $president = null;
                            $encadrant_responsable = null;
                            $co_encadrant_responsable = null;
                           
                        foreach ($enseignants_stage as $enseignant)

                        {

                            if ($enseignant->pivot->role == 'rapporteur')
                            {
                                $rapporteur = $enseignant ; 
                            }

                             if ($enseignant->pivot->role == 'président')   
                              {
                                $president = $enseignant ; 
                              }
                              
                              if ($enseignant->pivot->role == 'encadrant')
                            {
                                $encadrant_responsable = $enseignant ; 
                            }

                          if ($enseignant->pivot->role == 'co-encadrant')   
                            {
                              $co_encadrant_responsable = $enseignant ; 
                            }
                     

                        }
                        return  view('pages.affecter-jury',['stage' => $stage,
                    
                              'enseignant_responsable' => $enseignant_responsable,
                              'enseignants' => $enseignants,
                              'enseignants_stage' => $enseignants_stage , 
                              'rapporteur' => $rapporteur,
                              'president' => $president,
                              'encadrant_responsable' => $encadrant_responsable,
                              'co_encadrant_responsable' => $co_encadrant_responsable,
                            
                            
                            
                            

                    ]);
   }





   
   public function choisirSoutenancepfe($id)
   {
        $stage = Stage::find($id);
        $this->authorize('choisirDateSoutenancePfeSfe',$stage );  // admin saisie date soutenance pour les pfe et sfe
        
  
      return  view('pages.add-soutenance',['stage' => $stage]);
   }



  
}

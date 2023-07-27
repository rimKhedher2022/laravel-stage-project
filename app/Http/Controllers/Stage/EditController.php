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
  
    $etudiants = Etudiant::where('user_id', '!=', auth()->id())->get()  ;  // que les etudiants <> du l'etudiant connecté

    $binome = $etudiants_stage->filter(function  ($value, $key) use($id_auth) {
      return $value->id != $id_auth;
      
  })->first();  // 
  // $enseignants_stage = $stage->enseignants() ; // les enseignants responsable d'un stage
  // $enseignant_responsable = $enseignants_stage->first(); 

  // dd ($stage->enseignants) ;


    $societes = Societe::all();
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

   public function affecter($id)
   {
        $stage = Stage::find($id);
        $enseignants = Enseignant::all();
    $this->authorize('affecter', $stage );  // que l'admin peut voir la page d'affectation
 
      $enseignants_stage = $stage->enseignants; // les enseignants responsable d'un stage
      $enseignant_responsable = $enseignants_stage->first(); 
          $invite = null;
          $examinateur = null;
          $rapporteur = null;
          $encadrant = null;
      foreach ($enseignants_stage as $enseignant)

      {

        if ($enseignant->pivot->role == 'invite')
        {
              $invite = $enseignant ; 
        }

    elseif ($enseignant->pivot->role == 'examinateur')   
    
          {
            $examinateur = $enseignant ; 
          }
    elseif ($enseignant->pivot->role == 'rapporteur')   
    
          {
            $rapporteur = $enseignant ; 
          }
    elseif ($enseignant->pivot->role == 'encadrant')   
    
          {
            $encadrant = $enseignant ; 
          }

      }
       
       


      
  // dd ($stage->enseignants) ;


  
      return  view('pages.affecter-stage',['stage' => $stage,
  
            'enseignant_responsable' => $enseignant_responsable,
            'enseignants' => $enseignants,
            'enseignants_stage' => $enseignants_stage , 
            'invite' => $invite , 
            'examinateur'  => $examinateur  ,
            'rapporteur'=>$rapporteur,
            'encadrant'=>$encadrant

   ]);
   }

   public function choisirSoutenance($id)
   {
        $stage = Stage::find($id);
        $this->authorize('choisirDateSoutenance',$stage );  // que l'enseignant responsable choisi la date de soutenance
        
  
      return  view('pages.add-soutenance',['stage' => $stage]);
   }



  
}

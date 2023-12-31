<?php

namespace App\Http\Controllers\Stage;

use App\Enums\RoleType;
use App\Enums\StageEtat;
use App\Enums\StageType;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function ete()  // une seul fonction
    {

       
        $role = auth()->user()->role;
        // dd($role->value);
        switch ($role) {
          case RoleType::Administrateur:
            $stages = Stage::where('etat',StageEtat::DEPOSE)->get();
             
         
              break;
          case RoleType::Etudiant:
            $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
            $stages = $etudiant->stages; // (id == 2 )
             
              break;
          
          default:
          
          $enseignant = Enseignant::where('user_id',auth()->id())->first(); // 4

           $stages = $enseignant->stages()->where(function ($query) {
            $query->where('type', 'ouvrier')
                  ->orWhere('type', 'technicien');
        })->get();
                  
       
              break;
      }
     return  view('pages.stages',['stages' => $stages , 'role' => $role ]);
 
    }


    public function enseiPFESFE()
    {

      
      $this->authorize('stagesConsultesParEnseignant', Stage::class);

      $enseignant = Enseignant::where('user_id',auth()->id())->first(); // 4

      $stages = $enseignant->stages()->where(function ($query) {
        $query->where('type', 'pfe')
              ->orWhere('type', 'sfe');
    })->get();

    
  
  


      return  view('pages.interface-enseigants-encadrants-pfe-sfe',['stages' => $stages ]);
    }

    public function stagesPfeSfeEncadrant()  // une seul fonction
    {

       
       $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $role = auth()->user()->role;
        // dd($role->value);
      
        
            $stages = Stage::where('etat',StageEtat::CREE)
                        ->whereIn('type', [StageType::PFE, StageType::SFE])
                        ->get();
          
         
            
             
            return  view('pages.stages-pfe-a-affecter',['stages' => $stages , 'role' => $role ]); // admin consulte cette page 
            
       
      }
    public function stagesPfeSfeJury()  // une seul fonction
    {

        $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $role = auth()->user()->role;
        // dd($role->value);
      
        
            $stages = Stage::where('etat',StageEtat::CORRIGE)
                      ->whereIn('type', [StageType::PFE, StageType::SFE])
                      ->get();
                                
                        
          
         
            
             
            return  view('pages.stages-pfe-a-affecter-jurys',['stages' => $stages , 'role' => $role ]);
            
       
      }
    
 
  }


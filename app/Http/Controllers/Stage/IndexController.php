<?php

namespace App\Http\Controllers\Stage;

use App\Enums\RoleType;
use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
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

           $stages = $enseignant->stages;
            
       
              break;
      }
     return  view('pages.stages',['stages' => $stages , 'role' => $role ]);
 
    }
}

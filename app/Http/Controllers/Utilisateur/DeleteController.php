<?php

namespace App\Http\Controllers\Utilisateur;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     $user= User::find($id);
     $this->authorize('delete', $user); 
     
     if ($user->role->value === 'etudiant')
     {
         // 4
        $stages_id = $user->etudiant->stages->pluck('id');// (id == 2 )
        // dd($stages_id);
        if($stages_id ){

            $user->etudiant->stages()->detach($stages_id);  // supprimer le stage associé

            foreach ( $user->etudiant->stages as $stage)
            {
                $stage->delete() ;
            }


           
        }
      
       
        $user->delete() ;
        
     }

     elseif($user->role->value === 'enseignant')
     {

        $enseignant = Enseignant::where('user_id',$user->id)->first(); // 4
        $stages_id = $enseignant->stages->pluck('id');// (id == 2 )
        // dd($stages_id);
        if($stages_id){
          

            // changer l'etat du stage
        //     $enseignant->stages->update([
        //         'etat'=> StageEtat::CREE
        //   ]);

            $enseignant->stages()->detach($stages_id);  // supprimer le stage associé
        }
        $user->delete() ;

     }

     return redirect('/user-management');
 
    }
}

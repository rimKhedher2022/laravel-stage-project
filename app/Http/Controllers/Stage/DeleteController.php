<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Stage;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     $stage= Stage::find($id);
   
    //  $stage->etudiants()->detach(Etudiant::where('user_id',auth()->id())->first()->id); // un seul etudiant ?? mais le deuxieme doit etre supprimé aussi

    //  $etudiants_stage = $stage->etudiants ;
    //  $id_auth = Etudiant::where('user_id',auth()->id())->first()->id; //2
    //  $binome = $etudiants_stage->filter(function  ($value, $key) use($id_auth) {
    //     return $value->id != $id_auth;
        
    // })->first(); 


    // if($binome){
    //      $stage->etudiants()->detach($binome->id) ;// supprimer le binome aussi de la table etudiant_stage
    //   }
    $etudiants_ids = $stage->etudiants->pluck('id'); // les ids des etudiants qui ont réalisé le stage
    $enseignants_ids = $stage->enseignants->pluck('id');
    $stage->etudiants()->detach($etudiants_ids) ; // on supprime du table etudiant_stage
    $stage->enseignants()->detach($enseignants_ids) ; // on supprime du table enseignant_stage
    $stage->delete() ; 
    return redirect('/stages');
 
    }
}

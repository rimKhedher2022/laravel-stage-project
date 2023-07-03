<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\EtudiantStage;
use App\Models\Societe;
use App\Models\Stage;
use Illuminate\Http\Request;

class EditController extends Controller
{
   public function __invoke($id)
   {
    $stage = Stage::find($id);
    $this->authorize('view', $stage );
    $id_auth = Etudiant::where('user_id',auth()->id())->first()->id; //2  
   //  $etudiants_list = Etudiant::where('user_id','<>',auth()->id())->get();
    $etudiants_stage = $stage->etudiants; // 2 et 3
  
    $etudiants = Etudiant::where('user_id', '!=', auth()->id())->get()  ;  // que les etudiants <> du l'etudiant connecté

    $binome = $etudiants_stage->filter(function  ($value, $key) use($id_auth) {
      return $value->id != $id_auth;
      
  })->first();

//  dd ($binome->first()) ;


    $societes = Societe::all();
    return  view('pages.edit-stage',['stage' => $stage,
    'societes' => $societes , 
    'etudiants' => $etudiants,
    'etudiants_stage'=> $etudiants_stage ,
    'id_auth'=>$id_auth , 
    'binome'=>$binome
     
  
   ]);
   }
  
}

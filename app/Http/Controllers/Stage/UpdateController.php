<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StageStoreRequest;
use App\Http\Requests\StageUpdateRequest;
use App\Models\Etudiant;
use App\Models\EtudiantStage;
use App\Models\Stage;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(StageUpdateRequest $request  , $id) {

        $stage = Stage::find($id);
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

    if ($binome?->id !== $request->etudiant_id ) 
    {
         if($binome){
           // $etudiants_stage->detach($binome->id) ; 
            // $etudiants_stage->authors()->detach($authorId);
            $stage->etudiants()->detach($binome->id) ;// supprimer l'ancien binome
         }
        EtudiantStage::create([  // 
        'stage_id'=>$stage->id,
        'etudiant_id'=> $request->etudiant_id, // le binome
        ]);
    }
    return back()->with('succes', 'stage mis a jour . ');
    


}


}

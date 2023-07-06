<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StageStoreRequest;
use App\Models\Etudiant;
use App\Models\EtudiantStage;
use App\Models\Societe;
use App\Models\Stage;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function show()
    {
        $societes = Societe::all();
        return view('pages.add-stage',['societes' => $societes]);
    }

    public function store(StageStoreRequest $request) {

       
        $stage = Stage::create([
            'type'=>$request->type,
            'sujet'=>$request->sujet,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'societe_id'=>$request->societe_id,
            // 'etat'=>$request->etat,
            'date_soutenance'=>$request->date_soutenance,
            
        ]);
        $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
        EtudiantStage::create([
            
             $id = $etudiant->id,// 2
            'stage_id'=>$stage->id,
            // 'etudiant_id'=> auth()->id(), //4 user_id
            'etudiant_id'=> $id, // 2  etudiant_id
        ]);
       

        return back()->with('succes', 'stage ajouté ');
    }
}

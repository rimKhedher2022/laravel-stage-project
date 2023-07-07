<?php

namespace App\Http\Controllers\Rapport;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Http\Requests\RapportStoreRequest;
use App\Models\Etudiant;
use App\Models\Rapport;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{


    public function show()
    {

     $rapports= Rapport::all();
     $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
     $stages = $etudiant->stages; // (id == 2 )
   
    //  $this->authorize('create'); 
     return  view('pages.add-rapport',['rapports' =>  $rapports  , 'stages'=> $stages]);
    }

    // public function store(SessionDeDepotStoreRequest $request) {
    //     // $this->authorize('create');
        
    //     $session = SessionDeDepot::create([
  
    //         'date_debut' => $request->date_debut,
    //         'date_fin' =>$request->date_fin,
    //         'user_id' =>$request->user_id,
    //     ]);

    //     // $this->authorize('restore',  $session );

        

    //     return back()->with('succes', 'session ajouté ');



    // }





    public function store(RapportStoreRequest $request) {


    
        $rapport = Rapport::create([
          
            'filePath' => $request->filePath,
            'titre' =>$request->titre,
            'date_depot' => Carbon::now(),
            'stage_id' =>$request->stage_id,
        ]);
       $stage = $rapport->stage;
       $stage->update([
        'etat'=> StageEtat::DEPOSE
        ]);


        

        return back()->with('succes', 'rapport déposé ');



    }
}

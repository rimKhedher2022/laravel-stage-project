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


    public function show($id)
    {
    $this->authorize('create',Rapport::class);
     $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
     $stages = $etudiant->stages; // (id == 2 )
     
     $stage_a_deposer_rapport = Stage::find($id) ; 
    
       
  
   
   
     return  view('pages.add-rapport',[ 'stages'=> $stages , 'stage_a_deposer_rapport'=> $stage_a_deposer_rapport]);
    }

   


    public function store(RapportStoreRequest $request ) {
 
     
        
        $this->authorize('create',Rapport::class);
        $rapport_ancien = Rapport::where('stage_id' , 10 )->first() ;  // a vérifier
     
       if (empty($rapport_ancien))

       {

        $rapport = Rapport::create([
          
            'filePath' => $request->filePath,
            'titre' =>$request->titre,
            'date_depot' => Carbon::now(),
            'stage_id' => 10 , // c faux
        ]);
       $stage = $rapport->stage;
       $stage->update([
        'etat'=> StageEtat::DEPOSE
       ]);

       return back()->with('succes', 'rapport déposé ');
       }

       else {
        return back()->with('error', 'vous avez déja fait le dépot');
       }

    }
}

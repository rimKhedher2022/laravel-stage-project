<?php

namespace App\Http\Controllers\Rapport;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Http\Requests\RapportStoreRequest;
use App\Models\Etudiant;
use App\Models\Rapport;
use App\Models\Stage;
use App\Models\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class StoreController extends Controller
{


    public function show($id)
    {

    
    $stage_a_deposer_rapport = Stage::find($id) ; 
    
    $stages_user  = auth()->user()->etudiant->stages ;
  
    $this->authorize('create',Rapport::class);
       
        if (FacadesGate::denies('add-rapport',$stage_a_deposer_rapport)) {
            abort(403);
        }

     return  view('pages.add-rapport',[ 'stage_a_deposer_rapport'=> $stage_a_deposer_rapport]);
    }

   


    public function store(RapportStoreRequest $request , $stage_id ) {
 
     
        $stage = Stage::find($stage_id) ; 
        $this->authorize('create',Rapport::class);
    
        
        $rapport_ancien = Rapport::where('stage_id' , $stage_id)->first() ;  // a vérifier
     
       if (empty($rapport_ancien)) // true

       {

       $filename='' ; 
       if ($request->hasFile('filePath'))
       {
         $filename = $request->getSchemeAndHttpHost() . '/assets/storage/' . time() . '.' . $request->filePath->extension() ;
         $request->filePath->move(public_path('/assets/storage/'),$filename) ;
       }

        $rapport = Rapport::create([
          
            'filePath' =>  $filename,
            'titre' =>$request->titre,
            'date_depot' => Carbon::now(),
            'stage_id' => $stage_id , 
        ]);
       $stage = $rapport->stage;
       $stage->update([
        'etat'=> StageEtat::DEPOSE
       ]);

       return redirect()->route("rapports")->with('message', 'Rapport déposé avec succès ');
       }

       else {
        return back()->with('error', 'vous avez déja fait le dépot');
       }

    }
}

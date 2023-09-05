<?php

namespace App\Http\Controllers\Stage;

use App\Enums\StageEtat;
use App\Enums\StageType;
use App\Http\Controllers\Controller;
use App\Models\SessionDeDepot;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StageSansDepotController extends Controller
{
    public function stageEte()  // une seul fonction
    {

        $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $stages= Stage::where('etat',StageEtat::CREE)->get();
        $session_actuel_ete = SessionDeDepot::where('type_stage','Été')->latest()->first();
        $aujourdui = Carbon::now('GMT-7');

        // pour calculer le nb des message pour un stage
       
      foreach($stages as $stage ){
        
        // $messages = $stage->messages->where('user_id', auth()->user()->id);
        $stage->setAttribute('messages',count($stage->messages->where('user_id', auth()->user()->id)));
      }

      
        //  dd($stages) ;   // affichage // gate
        return  view('pages.sans-depots-ete',['stages' => $stages , 'session_actuel_ete'=> $session_actuel_ete , 'aujourdui' => $aujourdui]);
    }
    
    public function stagePFEsFE()  // une seul fonction
    {

      
        $this->authorize('stagesConsultesParAdministrateur', Stage::class);

        $stages= Stage::whereIn('etat',[StageEtat::AFFECTE_ENCADRANT,StageEtat::AFFECTE_ENCADRANTS])
                ->whereIn('type', [StageType::PFE, StageType::SFE])->get(); 

        $session_actuel_pfe = SessionDeDepot::where('type_stage','PFE')->latest()->first();
       
        $session_actuel_sfe = SessionDeDepot::where('type_stage','SFE')->latest()->first();
     

        $aujourdui = Carbon::now('GMT-7');

        // pour calculer le nb des message pour un stage
       
      foreach($stages as $stage ){
        
        // $messages = $stage->messages->where('user_id', auth()->user()->id);
        $stage->setAttribute('messages',count($stage->messages->where('user_id', auth()->user()->id)));
      }

      
        //  dd($stages) ;   // affichage // gate
        return  view('pages.stages-pfe-sans-depot',['stages' => $stages ,
                                                'session_actuel_pfe'=>  $session_actuel_pfe ,
                                                'session_actuel_sfe'=> $session_actuel_sfe , 
                                                'aujourdui' => $aujourdui]);
    }
}

<?php

namespace App\Http\Controllers\Stage;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Models\SessionDeDepot;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StageSansDepotController extends Controller
{
    public function __invoke()  // une seul fonction
    {

        $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $stages= Stage::where('etat',StageEtat::CREE)->get();
        $session_actuel = SessionDeDepot::latest()->first();
        $aujourdui = Carbon::now('GMT-7');

        // pour calculer le nb des message pour un stage

      foreach($stages as $stage ){
        $stage->setAttribute('messages',count($stage->messages));
      }
        //  dd($stages) ;   // affichage // gate
        return  view('pages.stages-sans-depots',['stages' => $stages , 'session_actuel'=> $session_actuel , 'aujourdui' => $aujourdui]);
    }
}

<?php

namespace App\Http\Controllers\Stage;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageSansDepotController extends Controller
{
    public function __invoke()  // une seul fonction
    {
        $stages= Stage::where('etat',StageEtat::CREE)->get();
        // pour calculer le nb des message pour un stage

      foreach($stages as $stage ){
        $stage->setAttribute('messages',count($stage->messages));
      }
        //  dd($stages) ;   // affichage // gate
        return  view('pages.stages-sans-depots',['stages' => $stages]);
    }
}

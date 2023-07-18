<?php

namespace App\Http\Controllers\Stage;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageAffectationController extends Controller
{
    public function __invoke()  // une seul fonction
    {
        // $stages= Stage::where('etat',StageEtat::AFFECTE)->get();
        $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $enseignants = Enseignant::all() ;
        $stages= Stage::where('etat','!=',StageEtat::CREE)->where('etat','!=',StageEtat::DEPOSE)->get(); // ne sont pas encore affectés aux enseignants 


        return  view('pages.stages-affectes',['stages' => $stages ,'enseignants' => $enseignants ]);
    }
}

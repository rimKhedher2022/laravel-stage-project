<?php

namespace App\Http\Controllers\Stage;

use App\Enums\StageEtat;
use App\Enums\StageType;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageAffectationController extends Controller
{
    public function stageEte()  // une seul fonction
    {
        // $stages= Stage::where('etat',StageEtat::AFFECTE)->get();
        $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $enseignants = Enseignant::all() ;
        $stages= Stage::where('etat','!=',StageEtat::CREE)->where('etat','!=',StageEtat::DEPOSE)->get(); // ne sont pas encore affectés aux enseignants 


        return  view('pages.affectes-ete',['stages' => $stages ,'enseignants' => $enseignants ]);
    }
  


    public function stagePFESFE()  // une seul fonction
    {
        // $stages= Stage::where('etat',StageEtat::AFFECTE)->get();
        $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $enseignants = Enseignant::all() ;
        $stages= Stage::whereIn('etat',[StageEtat::AFFECTE_ENCADRANT, StageEtat::AFFECTE_J , StageEtat::DEPOSE, StageEtat::CORRIGE])
                    ->whereIn('type', [StageType::PFE, StageType::SFE])->get(); 

        return  view('pages.stages-pfe-affectes',['stages' => $stages ,'enseignants' => $enseignants ]);
    }

    public function juriPFESFE()  // une seul fonction
    {
        // $stages= Stage::where('etat',StageEtat::AFFECTE)->get();
        $this->authorize('stagesConsultesParAdministrateur', Stage::class);
        $enseignants = Enseignant::all() ;
        $stages= Stage::where('etat',StageEtat::AFFECTE_J)
                    ->whereIn('type', [StageType::PFE, StageType::SFE])->get(); 

        return  view('pages.juri-pfe-affectes',['stages' => $stages ,'enseignants' => $enseignants ]);
    }




}

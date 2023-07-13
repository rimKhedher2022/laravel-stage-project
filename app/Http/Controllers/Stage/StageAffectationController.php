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
        $stages= Stage::where('etat',StageEtat::AFFECTE)->get();
        $enseignants = Enseignant::all() ;

        return  view('pages.stages-affectes',['stages' => $stages ,'enseignants' => $enseignants ]);
    }
}

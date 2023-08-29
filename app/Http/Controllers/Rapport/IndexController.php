<?php

namespace App\Http\Controllers\Rapport;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Rapport;
use App\Models\SessionDeDepot;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
    {
    $this->authorize('viewAny', Rapport::class); //ok
     // que les rapports de l'etudiant connecté
     $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
    
     $session_actuel_pfe = SessionDeDepot::where('type_stage','PFE')->latest()->first();
     $session_actuel_ete = SessionDeDepot::where('type_stage','Été')->latest()->first();
     $session_actuel_sfe = SessionDeDepot::where('type_stage','SFE')->latest()->first();

   
    //  dd($session_actuel);
     $stages = $etudiant->stages;
    

    // dd ($stages) ;
    //  $stages = Stage::whereNot('etat',StageEtat::VALIDE)->where('')->get() ;
    

     $aujourdui = Carbon::now('GMT-7'); // ???  ???????????????? timeZone , configuration  / policy : Stage_id fil create more arguments 
    //  dd($aujourdui) ;

     return  view('pages.rapports',['stages'=> $stages , 'session_actuel_pfe'=>$session_actuel_pfe ,'session_actuel_ete' => $session_actuel_ete , 'session_actuel_sfe'=> $session_actuel_sfe , 'aujourdui' => $aujourdui]);
 
    }
}

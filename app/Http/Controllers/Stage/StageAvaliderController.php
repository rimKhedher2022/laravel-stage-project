<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageAvaliderController extends Controller
{
    public function __invoke()  // une seul fonction
    {
        $this->authorize('stageAvalider', Stage::class); //ok
        $enseignant = Enseignant::where('user_id',auth()->id())->first(); // 4

           $stages = $enseignant->stages->filter(function  ($value, $key){
            return $value->etat == 'rapport vérifié et corrigé';
           }) ;
       
      
     return  view('pages.stages-a-valider',['stages' => $stages]);
 
    }
}

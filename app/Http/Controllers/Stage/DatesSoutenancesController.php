<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class DatesSoutenancesController extends Controller
{



    // public function index(Request $request)
    // {
  
    //     if($request->ajax()) {
       
    //          $data = Stage::whereDate('date_soutenance', '=', $request->start)
                   
    //                    ->get(['id', 'sujet', 'date_soutenance']);
  
    //          return response()->json($data);
    //     }
  
    //     return  view('pages.soutenances');
    // }


    public function __invoke()
    {
        $this->authorize('stageAvalider',Stage::class);
        $stages = array();
        $enseignant_stages = auth()->user()->enseignant->stages;

        foreach ($enseignant_stages as $stage)
        {
            

            // $stage->setAttribute('numero_jour',Carbon::createFromFormat('Y-m-d', $stage->date_soutenance)->format('N'));
            $stages[]=[
                'sujet'=> $stage->sujet,
                'date_soutenance'=> $stage->date_soutenance,
                
            ];
           
        }
        return  view('pages.soutenances',['stages' => $stages ]);
    }
}

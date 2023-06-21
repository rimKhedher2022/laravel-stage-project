<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StageStoreRequest;
use App\Models\Stage;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StageStoreRequest $request) {


        $stage = Stage::create([
            'type'=>$request->type,
            'sujet'=>$request->sujet,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'societe_id'=>$request->societe_id,
            'etat'=>$request->etat,
            'date_soutenance'=>$request->date_soutenance,
        ]);

       

        return $stage ;
    }
}

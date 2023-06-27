<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StageStoreRequest;
use App\Http\Requests\StageUpdateRequest;
use App\Models\Stage;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(StageUpdateRequest $request  , $id) {

        $stage = Stage::find($id);
        $stage->update(
        //     [
        //     'type'=>$request->type,
        //     'sujet'=>$request->sujet,
        //     'date_debut'=>$request->date_debut,
        //     'date_fin'=>$request->date_fin,
        //     'societe_id'=>$request->societe_id,
        //     'etat'=>$request->etat,
        //     'date_soutenance'=>$request->date_soutenance,
        // ]
        $request->all()
    );

       

    return back()->with('succes', 'stage mis a jour . ');
    }
}

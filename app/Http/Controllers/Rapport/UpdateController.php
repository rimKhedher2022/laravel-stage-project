<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Http\Requests\RapportStoreRequest;
use App\Http\Requests\RapportUpdateRequest;
use App\Models\Rapport;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(RapportUpdateRequest $request , $id) {
        $rapport = Rapport::find($id);
        $rapport->update(
        //     [
        //     'filePath' => $request->filePath,
        //     'titre' =>$request->titre,
        //     'date_depot' =>$request->date_depot,
        //     'stage_id' =>$request->stage_id,
        // ]
        $request->all()
    );
        return $rapport ;
    }
}

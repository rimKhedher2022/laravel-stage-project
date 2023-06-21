<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Http\Requests\RapportStoreRequest;
use App\Models\Rapport;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(RapportStoreRequest $request) {


        $rapport = Rapport::create([
          
      
            'filePath' => $request->filePath,
            'titre' =>$request->titre,
            'date_depot' =>$request->date_depot,
            'stage_id' =>$request->stage_id,
        ]);

        

        return $rapport ;



    }
}

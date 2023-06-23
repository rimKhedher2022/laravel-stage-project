<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionDeDepotStoreRequest;
use App\Models\SessionDeDepot;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(SessionDeDepotStoreRequest $request) {


        $session = SessionDeDepot::create([
  
            'date_debut' => $request->date_debut,
            'date_fin' =>$request->date_fin,
            'user_id' =>$request->user_id,
        ]);

        

        return $session ;



    }
}

<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionDeDepotStoreRequest;
use App\Models\SessionDeDepot;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function show()
    {

     $sessions= SessionDeDepot::all();
     return  view('pages.add-session',['sessions' => $sessions ]);
    }

    public function store(SessionDeDepotStoreRequest $request) {


        $session = SessionDeDepot::create([
  
            'date_debut' => $request->date_debut,
            'date_fin' =>$request->date_fin,
            'user_id' =>$request->user_id,
        ]);

        

        return back()->with('succes', 'session ajouté ');



    }
}

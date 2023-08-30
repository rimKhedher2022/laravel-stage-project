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
     $this->authorize('create',SessionDeDepot::class);
     return  view('pages.add-session',['sessions' => $sessions ]);
    }

    public function store(SessionDeDepotStoreRequest $request) {

        $this->authorize('create',SessionDeDepot::class);
        $session = SessionDeDepot::create([
  
            'date_debut' => $request->date_debut,
            'date_fin' =>$request->date_fin,
            'type_stage' =>$request->type_stage,
            'user_id' =>auth()->user()->id ,
        ]);

        // $this->authorize('restore',  $session );

        

        return back()->with('succes', 'Session ajoutée avec succès.');



    }
}

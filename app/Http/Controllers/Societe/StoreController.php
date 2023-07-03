<?php

namespace App\Http\Controllers\Societe;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocieteStoreRequest;
use App\Models\Societe;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function show()
    {
        $societes = Societe::all();
        return view('pages.add-societe',['societes' => $societes]);
    }

    public function store(SocieteStoreRequest $request) {

      
        $societe = Societe::create([
            'nom' => $request->nom ,
            'telephone' =>$request->telephone  ,
            'adresse' =>$request->adresse  ,
        ]);

       
        return back()->with('succes', 'société ajouté ');



    }
}

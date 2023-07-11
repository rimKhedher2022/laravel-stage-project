<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageDeRappelStoreRequest;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use Illuminate\Http\Request;

class StoreController extends Controller
{


    public function show()
    {
    
        $this->authorize('create',MessageDeRappel::class);
        $etudiants = Etudiant::where('user_id', '!=', auth()->id())->get()  ;
     return  view('pages.add-message' ,['etudiants'=>$etudiants]) ;
    }

    public function store(MessageDeRappelStoreRequest $request) {

        $this->authorize('create',MessageDeRappel::class);
        $message = MessageDeRappel::create([
            'titre'=> $request->titre ,
            'description'=> $request->description ,
            'etudiant_id'=> $request->etudiant_id ,
            'user_id'=> auth()->user()->id ,
        ]);

       
        return back()->with('succes', 'meessage envoyé ');



    }
}

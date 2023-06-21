<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageDeRappelStoreRequest;
use App\Models\MessageDeRappel;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(MessageDeRappelStoreRequest $request) {

      
        $message = MessageDeRappel::create([
            'titre'=> $request->titre ,
            'description'=> $request->description ,
            'etudiant_id'=> $request->etudiant_id ,
            'user_id'=> $request->user_id ,
        ]);

       
        return $message  ;



    }
}

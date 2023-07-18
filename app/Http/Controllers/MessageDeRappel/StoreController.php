<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageDeRappelStoreRequest;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\Stage;
use Illuminate\Http\Request;

class StoreController extends Controller
{


    // public function show($id)
    // {
    
    //     $this->authorize('create',MessageDeRappel::class);
    //     $etudiant_a_envoyer_message = Etudiant::where('id',$id)->first()  ;
    //  return  view('pages.add-message' ,['etudiant_a_envoyer_message'=>$etudiant_a_envoyer_message]) ;
    // }



    public function store(MessageDeRappelStoreRequest $request , $id) { 
        
        // STAGE_id

        $this->authorize('create',MessageDeRappel::class);
        $stage = Stage::find($id) ;
       // $etudiants_stage = $stage->etudiants ;
            $message = MessageDeRappel::create([
                // 'titre'=> $request->titre ,
                // 'description'=> $request->description ,
                // 'etudiant_id'=> $etudiant_a_envoyer_message->id,
                'titre'=> 'rappel de dépot' ,
                'description'=> 'veuillez déposer votre rapport avant la fermeture de session' , //la page 50 
                'stage_id'=> $stage->id,
                'user_id'=> auth()->user()->id ,
            ]);

        return back()->with('message', 'meessage envoyé avec succés ');



    }
}

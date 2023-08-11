<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageDeRappelStoreRequest;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\Stage;
use Illuminate\Http\Request;
use App\Mail\MessageDeRappelMail;
use Illuminate\Support\Facades\Mail ;

class StoreController extends Controller
{


    public function show($id)
    {
    
        // $this->authorize('create',MessageDeRappel::class);
    $stage_a_envoyer_message = Stage::where('id',$id)->first()  ;
     return  view('pages.add-message' ,['stage_a_envoyer_message'=> $stage_a_envoyer_message]) ;
    }



    public function store(MessageDeRappelStoreRequest $request , $id) { 

        $this->authorize('create',MessageDeRappel::class);
        $stage = Stage::find($id) ;
       // $etudiants_stage = $stage->etudiants ;
            $message = MessageDeRappel::create([
                // 'titre'=> $request->titre ,
                // 'description'=> $request->description ,
                // 'etudiant_id'=> $etudiant_a_envoyer_message->id,
                'titre'=> 'rappel de dépot' ,
                'description'=> 'veuillez déposer votre rapport avant la fermeture de session' , 
                'stage_id'=> $stage->id,
                'user_id'=> auth()->user()->id ,
            ]);

            $etudiants_a_envoyer_message = $stage->etudiants;
            // dd($etudiants_a_envoyer_message) ;
           foreach ( $etudiants_a_envoyer_message as $etudiant)
           {
           
                Mail::to($etudiant->user->email)->send(new MessageDeRappelMail($message));
            
                dd("Email is sent successfully.");
           }
            

        return back()->with('message', 'meessage envoyé avec succés ');

    }
    public function send(MessageDeRappelStoreRequest $request , $id) { 

        // $this->authorize('create',MessageDeRappel::class);
        $stage = Stage::find($id) ;
       // $etudiants_stage = $stage->etudiants ;
            $message = MessageDeRappel::create([
                // 'titre'=> $request->titre ,
                'description'=> $request->description ,
                // 'etudiant_id'=> $etudiant_a_envoyer_message->id,
                'titre'=> 'demande de correction' ,
                // 'description'=> 'veuillez déposer votre rapport avant la fermeture de session' , //la page 50 
                'stage_id'=> $stage->id,
                'user_id'=> auth()->user()->id ,
            ]);

        return back()->with('message', 'meessage envoyé avec succés ');

    }
}

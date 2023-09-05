<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageDeRappelStoreRequest;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\Stage;
use Illuminate\Http\Request;
use App\Mail\MessageDeRappelMail;
use App\Models\SessionDeDepot;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail ;

class StoreController extends Controller
{


    public function showNotFound()
    {
        return response()->view('pages.notfound', [], Response::HTTP_NOT_FOUND);
    }


    public function show($id)
    {
    
        // $this->authorize('create',MessageDeRappel::class);
    $this->authorize('adminMessages',MessageDeRappel::class);
    $stage_a_envoyer_message = Stage::where('id',$id)->first()  ;
     return  view('pages.add-message' ,['stage_a_envoyer_message'=> $stage_a_envoyer_message]) ;
    }



    public function store(MessageDeRappelStoreRequest $request , $id) { 

        $this->authorize('create',MessageDeRappel::class);
        $stage = Stage::find($id) ;
     
       
       

        if ($stage->type == 'technicien' || $stage->type == 'ouvrier')
        {
            $session_actuel= SessionDeDepot::where('type_stage','Été')->latest()->first();
            $dateFin = Carbon::createFromFormat('Y-m-d', $session_actuel->date_fin);
        }

        elseif($stage->type == 'pfe')
        {
            $session_actuel = SessionDeDepot::where('type_stage','PFE')->latest()->first();
            $dateFin = Carbon::createFromFormat('Y-m-d', $session_actuel->date_fin);

        }
        elseif($stage->type == 'sfe')
        {
            $session_actuel = SessionDeDepot::where('type_stage','SFE')->latest()->first();
            $dateFin = Carbon::createFromFormat('Y-m-d', $session_actuel->date_fin);
        }

   
             // Assuming the format is YYYY-MM-DD
            $formattedDate = $dateFin->format('d-m-Y');
            $message = MessageDeRappel::create([
                // 'titre'=> $request->titre ,
                // 'description'=> $request->description ,
                // 'etudiant_id'=> $etudiant_a_envoyer_message->id,
                'titre'=> 'Rappel de dépot du rapport' ,
                'description'=> 'Veuillez déposer votre rapport avant cette date : '.$formattedDate,
                'stage_id'=> $stage->id,
                'user_id'=> auth()->user()->id ,
            ]);


            $etudiants_a_envoyer_message = $stage->etudiants;
            // dd($etudiants_a_envoyer_message) ;
           foreach ( $etudiants_a_envoyer_message as $etudiant)
           {
           
                Mail::to($etudiant->user->email)->send(new MessageDeRappelMail($message));
    
           }
            

        return back()->with('message', 'Message envoyé avec succés.');

    }

    
    public function send(MessageDeRappelStoreRequest $request , $id) { 
        $stage = Stage::find($id) ;
            $message = MessageDeRappel::create([
                'description'=> $request->description ,
                'titre'=> 'Demande de correction' ,
                'stage_id'=> $stage->id,
                'user_id'=> auth()->user()->id ,
            ]);
            $etudiants_a_envoyer_message = $stage->etudiants;
           foreach ( $etudiants_a_envoyer_message as $etudiant)
           {
                Mail::to($etudiant->user->email)->send(new MessageDeRappelMail($message));
           }
        return back()->with('message', 'Message envoyé avec succés.');
    }
}

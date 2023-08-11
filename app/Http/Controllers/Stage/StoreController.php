<?php

namespace App\Http\Controllers\Stage;

use App\Enums\RoleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StageStoreRequest;
use App\Models\Etudiant;
use App\Models\EtudiantStage;
use App\Models\Societe;
use App\Models\Stage;
use App\Models\User;
use App\Notifications\NewStageCreeSansDepotNotification;
use App\Notifications\StageCree;
use Illuminate\Auth\Events\Registered ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class StoreController extends Controller
{

    public function show()
    {
        $this->authorize('viewAny',Stage::class);
        $loggedInStudent = Etudiant::where('user_id', auth()->id())->first();
        $niveau = $loggedInStudent->niveau ; 
        $specialite = $loggedInStudent->specialite ; 
      
        $societes = Societe::where('validation_state','approved by admin')->get() ;       
        $etudiants = Etudiant::where('user_id', '!=', auth()->id())
        ->where('niveau', $loggedInStudent->niveau)
        ->where('specialite', $loggedInStudent->specialite)
        ->get() ;  // pour le binome
        return view('pages.add-stage',['societes' => $societes , 'etudiants' => $etudiants , 'niveau'=>$niveau , 'specialite'=>$specialite]);
    }


    public function plusInfo($id)
    {
       
        $stage = Stage::find($id);

        return view('pages.plus-information-stage' , ['stage' => $stage]);
    }

    public function store(StageStoreRequest $request) {

        $this->authorize('viewAny',Stage::class);
        $stage = Stage::create([
            'type'=>$request->type,
            'sujet'=>$request->sujet,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
            'societe_id'=>$request->societe_id,
            // 'etat'=>$request->etat,
          
            
        ]);
    
        $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4

        EtudiantStage::create([
            
             $id = $etudiant->id,// 2
            'stage_id'=>$stage->id,
            // 'etudiant_id'=> auth()->id(), //4 user_id
            'etudiant_id'=> $id, // 2  etudiant_id
        ]);

        if( $request->etudiant_id){
            EtudiantStage::create([
               'stage_id'=>$stage->id,
               'etudiant_id'=> $request->etudiant_id, // 2  etudiant_id
           ]);
   
        }
   
        return back()->with('succes', 'stage ajouté ');
    }


   
 
}

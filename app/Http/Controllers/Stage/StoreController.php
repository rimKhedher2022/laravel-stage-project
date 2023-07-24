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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class StoreController extends Controller
{

    public function show()
    {
        $this->authorize('viewAny',Stage::class);
        $societes = Societe::all();
        return view('pages.add-stage',['societes' => $societes]);
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
        // $admins = User::where('role',RoleType::Administrateur)->get() ; 
        // Notification::send($admins,new NewStageCreeSansDepotNotification($stage)) ; 
        return back()->with('succes', 'stage ajouté ');
    }


   
 
}

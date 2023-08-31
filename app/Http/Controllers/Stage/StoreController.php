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
        $diplôme = $loggedInStudent->diplôme ; 
        $societes = Societe::where('validation_state','approved by admin')->get() ; 

        $etudiants = Etudiant::where('user_id', '!=', auth()->id())
        ->where('niveau', $loggedInStudent->niveau)
        ->where('diplôme', $loggedInStudent->diplôme)
        ->where('specialite', $loggedInStudent->specialite)
        ->get() ;  // pour le binome

        return view('pages.add-stage',['societes' => $societes , 'etudiants' => $etudiants , 'niveau'=>$niveau ,'diplôme'=>$diplôme]);
    }


    public function plusInfo($id)
    {
        $stage = Stage::find($id);
        $this->authorize('enseignantQuiConsulte', $stage);

        $enseignants_stage = $stage->enseignants; // les enseignants responsable d'un stage
             
        $encadrant_responsable = null;
        $enseignant_responsable = null;
        $co_encadrant_responsable = null;
        $president_responsable = null;
        $rapporteur_responsable = null;

            foreach ($enseignants_stage as $enseignant)

        {

            if ($enseignant->pivot->role == 'encadrant')
            {
                $encadrant_responsable = $enseignant ; 
            }

              elseif ($enseignant->pivot->role == 'co-encadrant')   
            {
              $co_encadrant_responsable = $enseignant ; 
            }
              elseif ($enseignant->pivot->role == 'enseignant')   
            {
                $enseignant_responsable  = $enseignant ; 
            }

              elseif ($enseignant->pivot->role == 'president')   
            {
                $president_responsable  = $enseignant ; 
            }

              elseif ($enseignant->pivot->role == 'rapporteur')   
            {
                $rapporteur_responsable  = $enseignant ; 
            }
    
     

        }



        return view('pages.plus-information-stage' , 
        ['stage' => $stage,
        'encadrant_responsable'=> $encadrant_responsable ,
        'co_encadrant_responsable'=>$co_encadrant_responsable,
        'enseignant_responsable' => $enseignant_responsable,
        'president_responsable' => $president_responsable,
        'rapporteur_responsable' => $rapporteur_responsable
    ]);
    }




    public function plusInfoEtudiant($id)
    {
    
 
        $stage = Stage::find($id);
        $this->authorize('stagesConsultesParEtudiant', $stage ); 
        $enseignants_stage = $stage->enseignants; // les enseignants responsable d'un stage
             
                        $encadrant_responsable = null;
                        $enseignant_responsable = null;
                        $co_encadrant_responsable = null;
                        $president_responsable = null;
                        $rapporteur_responsable = null;

                            foreach ($enseignants_stage as $enseignant)

                        {

                            if ($enseignant->pivot->role == 'encadrant')
                            {
                                $encadrant_responsable = $enseignant ; 
                            }

                              elseif ($enseignant->pivot->role == 'co-encadrant')   
                            {
                              $co_encadrant_responsable = $enseignant ; 
                            }
                              elseif ($enseignant->pivot->role == 'enseignant')   
                            {
                                $enseignant_responsable  = $enseignant ; 
                            }

                              elseif ($enseignant->pivot->role == 'president')   
                            {
                                $president_responsable  = $enseignant ; 
                            }

                              elseif ($enseignant->pivot->role == 'rapporteur')   
                            {
                                $rapporteur_responsable  = $enseignant ; 
                            }
                    
                     

                        }

        return view('pages.plus-information-stage-etudiant' ,
         ['stage' => $stage,
         'encadrant_responsable'=> $encadrant_responsable ,
         'co_encadrant_responsable'=>$co_encadrant_responsable,
         'enseignant_responsable' => $enseignant_responsable,
         'president_responsable' => $president_responsable,
         'rapporteur_responsable' => $rapporteur_responsable,
        ]);
    }
    public function plusInfoAdmin($id)
    {
    
 
        $stage = Stage::find($id);
        $this->authorize('stagesConsultesParAdmin', $stage ); 
        $enseignants_stage = $stage->enseignants; // les enseignants responsable d'un stage
             
                        $encadrant_responsable = null;
                        $enseignant_responsable = null;
                        $co_encadrant_responsable = null;
                        $president_responsable = null;
                        $rapporteur_responsable = null;

                            foreach ($enseignants_stage as $enseignant)

                        {

                            if ($enseignant->pivot->role == 'encadrant')
                            {
                                $encadrant_responsable = $enseignant ; 
                            }

                              elseif ($enseignant->pivot->role == 'co-encadrant')   
                            {
                              $co_encadrant_responsable = $enseignant ; 
                            }
                              elseif ($enseignant->pivot->role == 'enseignant')   
                            {
                                $enseignant_responsable  = $enseignant ; 
                            }

                              elseif ($enseignant->pivot->role == 'president')   
                            {
                                $president_responsable  = $enseignant ; 
                            }

                              elseif ($enseignant->pivot->role == 'rapporteur')   
                            {
                                $rapporteur_responsable  = $enseignant ; 
                            }
                    
                     

                        }

        return view('pages.plus-information-stage-admin' ,
         ['stage' => $stage,
         'encadrant_responsable'=> $encadrant_responsable ,
         'co_encadrant_responsable'=>$co_encadrant_responsable,
         'enseignant_responsable' => $enseignant_responsable,
         'president_responsable' => $president_responsable,
         'rapporteur_responsable' => $rapporteur_responsable,
        ]);
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
   
        return back()->with('succes', 'Stage ajouté ');
    }


   
 
}

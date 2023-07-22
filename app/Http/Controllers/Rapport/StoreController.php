<?php

namespace App\Http\Controllers\Rapport;

use App\Enums\RoleType;
use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Http\Requests\RapportStoreRequest;
use App\Models\Etudiant;
use App\Models\Rapport;
use App\Models\Stage;
use App\Models\User;
use App\Notifications\NewStageAvecDepotNotification;
use App\Notifications\RapportCorrigeeNotification;
use Carbon\Carbon;
use Gate;
use GuzzleHttp\Psr7\Response as Psr7Response;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Storage;
use Spatie\FlareClient\Http\Response as HttpResponse;

class StoreController extends Controller
{


    public function show($id)
    {
        $this->authorize('create',Rapport::class);
    
    $stage_a_deposer_rapport = Stage::find($id) ; 
    
    $stages_user  = auth()->user()->etudiant->stages ;
  
    
       
        if (FacadesGate::denies('add-rapport',$stage_a_deposer_rapport)) {
            abort(403);
        }

     return  view('pages.add-rapport',[ 'stage_a_deposer_rapport'=> $stage_a_deposer_rapport]);
    }

   


    public function store(RapportStoreRequest $request , $stage_id ) {
 
     
        $stage = Stage::find($stage_id) ; 
        $this->authorize('create',Rapport::class);
    
        
        $rapport_ancien = Rapport::where('stage_id' , $stage_id)->first() ;  // a vérifier
     
       if (empty($rapport_ancien)) // true

       {

       $filename='' ; 
       if ($request->hasFile('filePath'))
       {
         $filename = time() . '.' . $request->filePath->extension() ;
         $request->filePath->move(public_path('/assets/storage/'),$filename) ;
       }

        $rapport = Rapport::create([
          
            'filePath' =>  $filename,
            'titre' =>$request->titre,
            'date_depot' => Carbon::now(),
            'stage_id' => $stage_id , 
        ]);
       $stage = $rapport->stage;
       $stage->update([
        'etat'=> StageEtat::DEPOSE
       ]);
        
       $admins = User::where('role',RoleType::Administrateur)->get() ; 
      
       Notification::send($admins,new NewStageAvecDepotNotification($stage)) ; 
       return redirect()->route("rapports")->with('message', 'Rapport déposé avec succès ');
       }

       else {
        return back()->with('error', 'vous avez déja fait le dépot');
       }

    }


    public function fordownload($file_path){

        
        $file_name = public_path('/assets/storage/'.$file_path);
        
        return response()->download($file_name);
    }


        public function valider ($rapport_id)
    {
        
        $rapport =Rapport::find($rapport_id) ; 
       
        $stage = $rapport->stage;
      
        $stage->update([
         'etat'=> StageEtat::CORRIGE
        ]);

        $admins = User::where('role',RoleType::Administrateur)->get() ; 
        Notification::send($admins,new RapportCorrigeeNotification($stage)) ; 
        return back()->with('message', 'rapport validé (vérifié et corrigé) avec succés, le stagiaire est notifié que son rapport est validé ,Veuillez choisir la date de soutenance.');

    }
        public function annulervalidation ($rapport_id)
    {
        
        $rapport =Rapport::find($rapport_id) ; 
       
        $stage = $rapport->stage;
      
        $stage->update([
         'etat'=> StageEtat::AFFECTE,
         'date_soutenance' => null
        ]);
        return back()->with('message', 'validationn du rapport annulée avec succés ,le stagiaire est notifié que son rapport est non-validé , Veuillez corriger le rapport de votre stagiaire et valider le rapport ensuite');

    }

}

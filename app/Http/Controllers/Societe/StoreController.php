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
        $this->authorize('viewAny', Societe::class );
        $societes = Societe::all();
        
        return view('pages.add-societe',['societes' => $societes]);
    }

    public function store(SocieteStoreRequest $request) {

      
        $societe = Societe::create([
            'nom' => $request->nom ,
            'telephone' =>$request->telephone  ,
            'adresse' =>$request->adresse  ,
            'ville' =>$request->ville  ,
        ]);
      
       

       
        return back()->with('succes', 'société à proposer est envoyée ,l\'admin va valider la société proposé ');



    }


    public function approve($societeId)
{
   
    $societe = Societe::find($societeId);
    
    
    // Update the validation state
    $societe->update(['validation_state' => 'approved by admin']);
    return back()->with('message', 'société validé avec succés ');

}
}

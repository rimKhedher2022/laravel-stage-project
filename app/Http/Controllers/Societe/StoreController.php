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

        $countryData = file_get_contents('https://restcountries.com/v3.1/all');
        $countries = json_decode($countryData, true);
    
        $countryMapping = [];
        foreach ($countries as $country) {
            $countryCode = $country['cca3'] ?? null;
            $countryName = $country['translations']['fra']['common'] ?? null;
            
            if ($countryCode && $countryName) {
                $countryMapping[$countryCode] = $countryName;
            }
        }


     
            $paysCode = $request->input('pays'); // Code de pays
            $pays = $countryMapping[$paysCode] ?? null; // Obtenez le nom complet à partir du code, sinon null

    if ($pays !== null) {

        $societe = Societe::create([
            'nom' => $request->nom ,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            
            'pays' => $countryMapping[$paysCode],// Conversion en nom complet
            'fax' => $request->fax ,
            'email' =>$request->email,
         
        ]);
        if (auth()->user()->role->value === 'administrateur') {

            $societe->update(['validation_state' => 'approved by admin']);
            return back()->with('succes', 'société ajouté');
        }
        else {
            return back()->with('succes', 'Société à proposer est envoyée ,l\'administrateur va valider la société proposée.');
        }
       



    } else {
        return back()->with('error', 'Code de pays invalide');
    }
     
    }
       
      
       

       
      




    public function approve($societeId)
{
   
    $societe = Societe::find($societeId);
    
    
    // Update the validation state
    $societe->update(['validation_state' => 'approved by admin']);
    return back()->with('message', 'Société validée avec succès.');

}
}

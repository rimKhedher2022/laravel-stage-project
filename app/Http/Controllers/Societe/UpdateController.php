<?php

namespace App\Http\Controllers\Societe;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocieteStoreRequest;
use App\Http\Requests\SocieteUpdateRequest;
use App\Models\Societe;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(SocieteUpdateRequest $request , $id) {

        $societe = Societe::find($id);
        $this->authorize('view', $societe ); // l'admin peut gérer les informations des societes
        // dd( $request -> all());
        $societe->update(
            [
            'nom' => $request->nom ,
            'telephone' =>$request->telephone  ,
            'adresse' =>$request->adresse  ,
            'pays' =>$request->pays  ,
        ]
       
    );
    
    return back()->with('succes', 'société mise à jour. ');
    }
}

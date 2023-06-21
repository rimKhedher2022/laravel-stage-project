<?php

namespace App\Http\Controllers\Societe;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocieteStoreRequest;
use App\Models\Societe;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(SocieteStoreRequest $request) {

      
        $societe = Societe::create([
            'nom' => $request->nom ,
            'telephone' =>$request->telephone  ,
            'adresse' =>$request->adresse  ,
        ]);
        return   $societe  ;
    }
}

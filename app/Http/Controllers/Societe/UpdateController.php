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
        $societe->update(
        //     [
        //     'nom' => $request->nom ,
        //     'telephone' =>$request->telephone  ,
        //     'adresse' =>$request->adresse  ,
        // ]
        $request -> all()
    );
        return   $societe  ;
    }
}

<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantStoreRequest;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(EtudiantStoreRequest $request) {


        $user = User::create([
            'nom' => $request->nom ,
            'prenom' =>$request->prenom  ,
            'email' =>$request->email  ,
            'role' =>$request->role  ,
            'password' => Hash::make($request->password) ,
        ]);

        Etudiant::create([
                'cin'=>$request->cin ,
                'niveau'=>$request->niveau ,
                'specialite'=>$request->specialite ,
                'numero_inscription'=>$request->numero_inscription ,
                'user_id'=> $user->id,
        ]);

        return $user ;



    }
}

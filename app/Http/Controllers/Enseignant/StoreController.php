<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnseignantStoreRequest;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(EnseignantStoreRequest $request) {


        $user = User::create([
            'nom' => $request->nom ,
            'prenom' =>$request->prenom  ,
            'email' =>$request->email ,
            'role' =>$request->role ,
            'password' => Hash::make($request->password) ,
        ]);

        Enseignant::create([
              
                'matricule'=>$request->matricule,
                'user_id'=> $user->id,
        ]);

        return $user ;
    }
}

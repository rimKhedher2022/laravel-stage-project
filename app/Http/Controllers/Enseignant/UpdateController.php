<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnseignantStoreRequest;
use App\Http\Requests\EnseignantUpdateRequest;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(EnseignantUpdateRequest $request, $id) // une seule fonction
    {
     $enseignant= Enseignant::find($id);
     $user= User::find($enseignant->user_id);
  
     
     $user->update(
    //     [
    //      'nom' => $request->nom ,
    //      'prenom' =>$request->prenom  ,
    //      'email' =>$request->email  ,
    //      'role' =>$request->role  ,
    //      'password' => Hash::make($request->password) ,
    //  ]
    $request->all()
    );

     $enseignant->update(
    //     [
    //     'matricule'=>$request->matricule,
    //     'user_id'=> $user->id,
    //  ]
    $request->all()
    );
     return  $enseignant;
 
    }
}

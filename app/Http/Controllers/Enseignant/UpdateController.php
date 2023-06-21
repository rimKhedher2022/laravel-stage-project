<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnseignantStoreRequest;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(EnseignantStoreRequest $request, $id) // une seule fonction
    {
     $enseignant= Enseignant::find($id);
     $user= User::find($enseignant->user_id);
  
     
     $user->update([
         'nom' => $request->nom ,
         'prenom' =>$request->prenom  ,
         'email' =>$request->email  ,
         'role' =>$request->role  ,
         'password' => Hash::make($request->password) ,
     ]);

     $enseignant->update([
        'matricule'=>$request->matricule,
        'user_id'=> $user->id,
     ]);
     return  $enseignant;
 
    }
}

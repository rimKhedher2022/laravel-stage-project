<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantStoreRequest;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(EtudiantStoreRequest $request, $id) // une seule fonction
   {
    $etudiant = Etudiant::find($id);
    $user = User::find($etudiant->user_id);
    
   
    
    $user->update([
        'nom' => $request->nom ,
        'prenom' =>$request->prenom  ,
        'email' =>$request->email  ,
        'role' =>$request->role  ,
        'password' => Hash::make($request->password) ,
    ]);
       
  


    $etudiant->update([
            'cin'=>$request->cin ,
            'niveau'=>$request->niveau ,
            'specialite'=>$request->specialite ,
            'numero_inscription'=>$request->numero_inscription ,
            'user_id'=> $user->id,
    ]);
    
    return  $etudiant;

   }
}

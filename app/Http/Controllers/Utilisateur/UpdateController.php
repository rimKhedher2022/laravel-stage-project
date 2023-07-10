<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UserUpdateRequest $request , $id) {
        $user = User::find($id);
        $this->authorize('update',$user);
        $user->update(
            [
            'nom' => $request->nom,
            'prenom' =>$request->prenom,
            'email' =>$request->email,
        ] 

       
      
    );

    if ($user->role->value === 'etudiant')
    {
        $user->etudiant->update([
            'cin' => $request->cin,
            'niveau' =>$request->niveau,
            'specialite' =>$request->specialite,
            'numero_inscription' =>$request->numero_inscription,

        ]);

    }
    if ($user->role->value === 'enseignant')
    {
        $user->enseignant->update([
            'matricule' => $request->matricule,
          

        ]);

    }

  

    return back()->with('succes', 'les informations de cet utilisteur sont mis a jour . ');
    }
}

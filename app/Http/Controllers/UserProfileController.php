<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('pages.user-profile',['user'=>$user]);
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'nom' => ['required','max:255', 'min:2'],
            'prenom' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
           
      
        ]);

        auth()->user()->update([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email') ,
     
        ]);

        if (auth()->user()->role->value === 'etudiant')
        {
            auth()->user()->etudiant->update([
                'cin' => $request->cin,
                'niveau' =>$request->niveau,
                'specialite' =>$request->specialite,
                'numero_inscription' =>$request->numero_inscription,
    
            ]);
    
        }
        if (auth()->user()->role->value === 'enseignant')
        {
            auth()->user()->enseignant->update([
                'matricule' => $request->matricule,
              
    
            ]);
    
        }
    
      
        return back()->with('succes', 'Profile mis à jour avec succés');
    }
}

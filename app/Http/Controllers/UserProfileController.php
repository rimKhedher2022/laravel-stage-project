<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $image = $user->image;
        return view('pages.user-profile',['user'=>$user,'image'=>$image]);
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'nom' => ['required','max:255', 'min:2'],
            'prenom' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'image' => 'required|image', // name
           
      
        ]);


        $imageName ='' ; 
        if ($request->hasFile('image') && auth()->user()->image != 'null' )
        {
           
            unlink(public_path('img/'.auth()->user()->image));
         $imageName = time().'_'.$request->image->getClientOriginalName();
         $request->image->move(public_path('/img'),$imageName);

           
        }
        elseif(auth()->user()->image == 'null')
        {
            // dd(auth()->user()->image) ;
            if ($request->hasFile('image'))
            {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('/img'),$imageName);
            }
           
        }

       

        // if(auth()->user()->image != null)
        // {
        //     // dd(auth()->user()->image) ;
        //     unlink(public_path('img/'.auth()->user()->image));
        // }



        
        
       

        auth()->user()->update([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email') ,
            'image' => $imageName, // name
     
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

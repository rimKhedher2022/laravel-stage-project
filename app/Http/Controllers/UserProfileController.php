<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
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

    public function update(UserUpdateRequest $request,$id)
    {
        // $attributes = $request->validate([
        //     'nom' => ['required','max:255', 'min:2'],
        //     'prenom' => ['max:100'],
        //     'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
        //     'image' => 'required|image', // name
           
      
        // ]);

        $user = User::find($id);
        // $this->authorize('update',$user);
       
        $imageName =$user->image ; 
        // dd($request->hasFile('image'));
        if ($request->hasFile('image'))
        {
            if($user->image)
            {
                $oldImagePath = public_path('img/' . auth()->user()->image);
                if (file_exists($oldImagePath)&& is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $imageName = time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('/img'),$imageName);
            }

            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('/img'),$imageName);
        }
    
        $user->update(
            [
            'nom' => $request->nom,
            'prenom' =>$request->prenom,
            'email' =>$request->email,
            'image' => $imageName, // name
        ] 
    );


        // auth()->user()->update([
        //     'nom' => $request->get('nom'),
        //     'prenom' => $request->get('prenom'),
        //     'email' => $request->get('email') ,
        //     'image' => $imageName, // name
     
        // ]);

        if ($user->role->value === 'etudiant')
        {
            
            
        $user->update(
            [
            'nom' => $request->nom,
            'prenom' =>$request->prenom,
            'email' =>$request->email,
            'image' => $imageName, // name
            ] 
            );


            $user->etudiant->update([
                
                'cin' => $request->cin,
                // 'niveau' =>$request->niveau,
                // 'specialite' =>$request->specialite,
                // 'numero_inscription' =>$request->numero_inscription,
                // 'diplôme' =>$request->diplôme,
    
            ]);
    
        }
        if ($user->role->value === 'enseignant')
        {

                 
        $user->update(
            [
            'nom' => $request->nom,
            'prenom' =>$request->prenom,
            'email' =>$request->email,
            'image' => $imageName, // name
            ] 
            );

            $user->enseignant->update([
             
                'matricule' => $request->matricule,
              
    
            ]);
    
        }
    
      
        return back()->with('succes', 'Profil mis à jour avec succès');
    }
}

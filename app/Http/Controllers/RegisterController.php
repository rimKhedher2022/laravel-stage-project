<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;

use App\Http\Requests\EtudiantStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Etudiant;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'nom' => 'required|max:255|min:2',
            
            'prenom' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            // 'terms' => 'required'
        ]);
        $user = User::create($attributes); // ??
      

        Etudiant::create([
        'user_id'=> $user->id,
            ]);
        auth()->login($user);

        return redirect('/dashboard');
    }
}

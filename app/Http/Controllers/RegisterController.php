<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;

use App\Enums\RoleType;
use App\Http\Requests\EtudiantStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;
use App\Events\Registered;
use App\Notifications\NewUserNotification;
use Illuminate\Auth\Events\Registered as EventsRegistered;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

// use Illuminate\Support\Facades\Notification as FacadesNotification;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
       
        
        $attributes = $request->validate([
            'nom' => 'required|max:255|min:2',
            'role' => 'required', // name
            'image' => 'required|image', // name
            'prenom' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            // 'terms' => 'required'
        ]);

        $imageName ='' ; 
        if ($request->hasFile('image'))
        {
         $imageName = time().'_'.$request->image->getClientOriginalName();
         $request->image->move(public_path('/img'),$imageName);
        }

        // $user = User::create($attributes); // ??
        $user=User::create([
            'nom' => $request->nom,
            'role' => $request->role, // name
            'image' => $imageName, // name
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->password,

        ]);
      
     if($attributes["role"] == "etudiant")
     {
        Etudiant::create([
            'user_id'=> $user->id,
                ]);
            
    
     }
     elseif ($attributes["role"] == "enseignant") {

        Enseignant::create([
            'user_id'=> $user->id,
                ]);
     }
    
     auth()->login($user);
    //  event(new EventsRegistered($user) ) ;
    $admins = User::where('role',RoleType::Administrateur)->get() ; 
      
    FacadesNotification::send($admins,new NewUserNotification($user)) ; 
     return redirect('/profile');
   
 
 }
       
      
}

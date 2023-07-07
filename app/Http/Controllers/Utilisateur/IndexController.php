<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;

class IndexController extends Controller
{

    public function __invoke()  // une seul fonction
    {
        $users = User::all() ; 
        // dd($users);
        
    return  view('pages.user-management',['users' => $users ]);
    }

}

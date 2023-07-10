<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $user = User::find($id);
        $this->authorize('view', $user);
        // $etudiant = Etudiant::where('user_id',$user->id)->first(); // 4
        // $enseignant = Enseignant::where('user_id',$user->id)->first(); // 4
        return  view('pages.edit-user',['user'=> $user]);
    }
}

<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function messagesAdministrateur()  // une seul fonction
    {
        $this->authorize('adminMessages', MessageDeRappel::class); // vu que par l'admin
        
        $user = User::where('id',auth()->id()) -> first() ; 
        $messages = $user->messages; // messages envoyés  par l' admin connecté ---> pour les gérer 
        // $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
        // dd($etudiant);
        // $stages_etudiant = $etudiant->stages;
        return  view('pages.messages',['messages' => $messages]);
 
    }


    
}

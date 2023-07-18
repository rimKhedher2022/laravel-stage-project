<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class IndexMessagesEtudiantsController extends Controller
{
    public function messagesEtudiant()  // une seul fonction
    {
        $this->authorize('etudiantMessages', MessageDeRappel::class); // messages envoyés a un etudiant ? fermer 
        $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
        $stages_etudiant = $etudiant->stages;
        return  view('pages.messages-etudiant',['stages_etudiant' =>  $stages_etudiant  ]);
 
    }
}

<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $message = MessageDeRappel::find($id);
        $this->authorize('view',$message);
        $etudiants = Etudiant::where('user_id', '!=', auth()->id())->get()  ;
    
            return  view('pages.edit-message',['message' => $message ,  'etudiants'=> $etudiants ]);
    }
}

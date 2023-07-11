<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
    {
     
        $this->authorize('viewAny', MessageDeRappel::class); //ok
        $user = User::where('id',auth()->id()) -> first() ; 
        
        $messages = $user->messages; // messages envoyés
        $messages_all = MessageDeRappel::all() ; 
       
       
       
      
       
        
       
        return  view('pages.messages',['messages' => $messages ,  'messages_all' =>  $messages_all ]);
 
    }
}

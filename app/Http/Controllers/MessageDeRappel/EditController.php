<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $message = MessageDeRappel::find($id);
        // $this->authorize('view',$message);
     
    //  dd(auth()->user()->enseignant->stages[0]->messages);
        $stage_relie_a_ce_message = $message?->stage ;    // le stage concerné 
        //  admin modifie son message à lui 
        // enseignant modifie son message a lui
       
        if($message !== null)
        {
            if (FacadesGate::denies('edit-message',$message)) {
                abort(403);
            }
        }

        else
        {
            abort(404);
        }
        
    
        return  view('pages.edit-message',['message' => $message , 'stage_relie_a_ce_message'=> $stage_relie_a_ce_message  ]);
    }
}

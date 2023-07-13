<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\Stage;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $message = MessageDeRappel::find($id);
        $this->authorize('view',$message);
        $stage_relie_a_ce_message = $message-> stage ;    // le stage concerné 
  
      
    
        return  view('pages.edit-message',['message' => $message , 'stage_relie_a_ce_message'=> $stage_relie_a_ce_message  ]);
    }
}

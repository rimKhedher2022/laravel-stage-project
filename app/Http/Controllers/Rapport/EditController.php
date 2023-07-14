<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Rapport;
use App\Models\Stage;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $rapport = Rapport::find($id);
        // dd($rapport->filePath) ;
        $this->authorize('view', $rapport);
        $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
      
        $stage_a_deposer_rapport = $rapport->stage;
        return  view('pages.edit-rapport',['rapport' => $rapport , 'stage_a_deposer_rapport' => $stage_a_deposer_rapport]);
    }
}

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
        $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
        $stages = $etudiant->stages; // (id == 2 )
        // $this->authorize('view', $session);
        return  view('pages.edit-rapport',['rapport' => $rapport , 'stages'=>$stages]);
    }
}

<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
    {

        $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
        
       
      // dd($id);
        $stages = $etudiant->stages; // (id == 2 )
      //dd($stages);
       
     return  view('pages.stages',['stages' => $stages]);
 
    }
}

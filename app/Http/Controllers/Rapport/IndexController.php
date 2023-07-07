<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Rapport;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
    {
     $rapports = Rapport::all();  // que les rapports de l'etudiant connecté
     $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
     $stages = $etudiant->stages; 

     return  view('pages.rapports',['rapports' => $rapports ,'stages'=> $stages ]);
 
    }
}

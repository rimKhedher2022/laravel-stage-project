<?php

namespace App\Http\Controllers\Enseignant;

use App\Enums\RoleType;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
   {
    $enseignants = Enseignant::all();
   
    // $enseignants = User::where('role',RoleType::Enseignant)->get(); 
    // dd ($enseignants);
   return  view('pages.enseignants',['enseignants' => $enseignants]);

   }
}

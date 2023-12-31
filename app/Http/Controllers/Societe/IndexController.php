<?php

namespace App\Http\Controllers\Societe;

use App\Enums\RoleType;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Societe;
use App\Models\Stage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
   {

    $this->authorize('viewAny', Societe::class); //ok
    
    $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
    $role = auth()->user()->role;
    $societes = [] ;
  //  dd($role);
    switch ($role) {
        case RoleType::Administrateur:
            $societes = Societe::latest()->get();


            break;
        case RoleType::Etudiant:

            $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
            $stage_societe_ids =  $etudiant->stages->pluck('societe_id')->toArray() ;
            $societes = Societe::whereIn('id',$stage_societe_ids)->get();
            break;
        
        default:
            # code...
            break;
    }

     // les societes dans lesquels l'etudiant a réalisé ses stages

    return  view('pages.societes',['societes' => $societes]);

   }
}

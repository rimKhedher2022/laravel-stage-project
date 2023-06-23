<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
   {

    $etudiant = Etudiant::find($id);
    $user = $etudiant->user;
    $etudiant-> delete() ;
    $user-> delete() ;
    return 'ok' ;
 //  objectif : delete user role = etudiant
   }
}

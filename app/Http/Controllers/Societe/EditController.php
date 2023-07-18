<?php

namespace App\Http\Controllers\Societe;

use App\Http\Controllers\Controller;
use App\Models\Societe;
use Illuminate\Http\Request;

class EditController extends Controller
{

    public function __invoke($id)
    {
       $societe = Societe::find($id);
       $this->authorize('view', $societe );  // que l'admin et etudiant peuvent consulter les sociétés
        return  view('pages.edit-societe',['societe'=> $societe]);
    }
}

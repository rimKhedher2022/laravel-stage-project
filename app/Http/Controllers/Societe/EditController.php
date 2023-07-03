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
       $this->authorize('view', $societe );
        return  view('pages.edit-societe',['societe'=> $societe]);
    }
}

<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     $enseignant= Enseignant::find($id);
     $user = $enseignant->user;
     $enseignant->delete() ;
     $user->delete() ;

     
     return 'ok';
 
    }
}

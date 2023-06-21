<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke()  // une seul fonction
   {
    return Etudiant::all();

   }
}

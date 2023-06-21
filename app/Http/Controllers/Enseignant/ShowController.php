<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)  // une seule fonction
   {
    return Enseignant::find($id);

   }
}

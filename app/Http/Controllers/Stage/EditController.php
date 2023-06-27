<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Societe;
use App\Models\Stage;
use Illuminate\Http\Request;

class EditController extends Controller
{
   public function __invoke($id)
   {
    $stage = Stage::find($id);
    $societes = Societe::all();
    return  view('pages.edit-stage',['stage' => $stage ,'societes'=> $societes]);
   }
  
}

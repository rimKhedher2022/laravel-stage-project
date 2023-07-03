<?php

namespace App\Http\Controllers\Societe;

use App\Http\Controllers\Controller;
use App\Models\Societe;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
   {
    $societe= Societe::find($id);
    $societe->delete() ;
    return redirect('/societes');
   }
}

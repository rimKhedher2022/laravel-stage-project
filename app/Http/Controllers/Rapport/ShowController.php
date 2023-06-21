<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)  // une seule fonction
   {
    return Rapport::find($id);

   }
}

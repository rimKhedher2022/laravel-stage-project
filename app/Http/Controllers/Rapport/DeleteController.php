<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     $rapport= Rapport::find($id);
     $rapport->delete() ;
     return redirect('/rapports');
 
    }
}

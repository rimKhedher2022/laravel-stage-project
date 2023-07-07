<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Models\SessionDeDepot;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     $session= SessionDeDepot::find($id);
     $this->authorize('delete',$session); 
     $session->delete() ;
     return redirect('/sessions');
 
    }
}

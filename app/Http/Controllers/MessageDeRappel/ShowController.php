<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\MessageDeRappel;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     return MessageDeRappel::find($id);
 
    }
}

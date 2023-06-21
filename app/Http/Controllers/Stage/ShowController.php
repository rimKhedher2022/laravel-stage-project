<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     return Stage::find($id);
 
    }
}

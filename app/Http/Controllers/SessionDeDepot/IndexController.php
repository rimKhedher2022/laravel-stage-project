<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Models\SessionDeDepot;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
    {
     $sessions= SessionDeDepot::all();
     return  view('pages.sessions',['sessions' => $sessions ]);

 
    }
}

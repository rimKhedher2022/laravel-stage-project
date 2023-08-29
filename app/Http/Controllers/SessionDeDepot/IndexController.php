<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Models\SessionDeDepot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
    {
  
     $this->authorize('viewAny', SessionDeDepot::class); //ok
     $aujourdui = Carbon::now('GMT-7'); 
     $sessions= SessionDeDepot::all();
     return  view('pages.sessions',['sessions' => $sessions,'aujourdui' => $aujourdui ]);

 
    }
}

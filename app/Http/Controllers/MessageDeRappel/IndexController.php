<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\MessageDeRappel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
    {
        $messages= MessageDeRappel::where('user_id',auth()->id()) ; 
        dd($messages) ; 
       
        return  view('pages.messages',['messages' => $messages ]);
 
    }
}

<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Models\SessionDeDepot;



class EditController extends Controller
{
    public function __invoke($id)
    {
        $session = SessionDeDepot::find($id);
            return  view('pages.edit-session',['session' => $session]);
    }
}

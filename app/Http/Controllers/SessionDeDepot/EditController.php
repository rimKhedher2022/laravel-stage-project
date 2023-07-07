<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Models\SessionDeDepot;



class EditController extends Controller
{
    public function __invoke($id)
    {
        $session = SessionDeDepot::find($id);
        $this->authorize('view', $session);
            return  view('pages.edit-session',['session' => $session]);
    }
}

<?php

namespace App\Http\Controllers\SessionDeDepot;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionDeDepotStoreRequest;
use App\Http\Requests\SessionDeDepotUpdateRequest;
use App\Models\SessionDeDepot;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(SessionDeDepotUpdateRequest  $request , $id) {

        $session = SessionDeDepot::find($id);
        $this->authorize('update',$session );
        $session ->update(
        //     [
        //     'date_debut' => $request->date_debut,
        //     'date_fin' =>$request->date_fin,
        //     'user_id' =>$request->user_id
        // ]
        $request->all()
    );
    return back()->with('succes', 'Session mise à jour . ');
    }
}

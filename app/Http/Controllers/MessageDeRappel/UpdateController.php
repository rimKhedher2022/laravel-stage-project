<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;

use App\Http\Requests\MessageDeRappelUpdateRequest;
use App\Models\MessageDeRappel;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(MessageDeRappelUpdateRequest $request , $id) {



        $this->authorize('adminMessages', MessageDeRappel::class); // vu que par l'admin
        $message = MessageDeRappel::find($id);
        $this->authorize('update',$message);

        $message->update(
        //     [
        //     'titre'=> $request->titre ,
        //     'description'=> $request->description ,
        //     'etudiant_id'=> $request->etudiant_id ,
        //     'user_id'=> $request->user_id ,
        // ]
        $request->all()
    );
    return back()->with('succes', 'message mis a jour.');
    }
}

<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Http\Requests\RapportStoreRequest;
use App\Http\Requests\RapportUpdateRequest;
use App\Models\Rapport;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(RapportUpdateRequest $request , $id) {
        $rapport = Rapport::find($id);
        $this->authorize('update',$rapport);
        $rapport->update(
        //     [
        //     'filePath' => $request->filePath,
        //     'titre' =>$request->titre,
        //     'date_depot' =>$request->date_depot,
        //     'stage_id' =>$request->stage_id,
        // ]
        $request->all()


    );


    $rapport_ancien = Rapport::where('stage_id' , $request->stage_id )->first() ; 
    
    // if (!empty($rapport_ancien))

    // {
    //     $rapport_ancien->delete() ;
    //     //  return back()->with('succes', 'rapport déposé ');
    // }


  

    return back()->with('succes', 'rapport à déposer mis a jour . ');
    }
}

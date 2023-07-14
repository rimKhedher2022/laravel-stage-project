<?php

namespace App\Http\Controllers\Rapport;

use App\Http\Controllers\Controller;
use App\Http\Requests\RapportStoreRequest;
use App\Http\Requests\RapportUpdateRequest;
use App\Models\Rapport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(RapportUpdateRequest $request , $id) {
        $rapport = Rapport::find($id);
        $this->authorize('update',$rapport);

        $filename='' ; 
       if ($request->hasFile('filePath'))
       {
         $filename = $request->getSchemeAndHttpHost() . '/assets/storage/' . time() . '.' . $request->filePath->extension() ;
         $request->filePath->move(public_path('/assets/storage/'),$filename) ;
       }

      // supprimer de storage / affichage du document 

        $rapport->update([
            'filePath' =>  $filename,
            'titre' =>$request->titre,
            'date_depot' => Carbon::now(),
           
        ]
        
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

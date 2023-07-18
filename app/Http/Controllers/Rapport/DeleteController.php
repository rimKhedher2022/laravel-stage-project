<?php

namespace App\Http\Controllers\Rapport;

use App\Enums\StageEtat;
use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
    {
     $rapport= Rapport::find($id);
     $enseignants_ids =  $rapport->stage->enseignants->pluck('id');
     $rapport->stage->update([
        'etat'=> StageEtat::CREE
     ]) ;
     // vérifier avec 
     if($enseignants_ids){
        $rapport->stage->enseignants()->detach($enseignants_ids) ;
     }
    
     $rapport->delete() ;
     unlink(public_path('assets/storage/'.$rapport->filePath));
   //   dd(Storage::exists($rapport->filePath));
   //   if(Storage::exists($rapport->filePath)){
   //    Storage::delete($rapport->filePath);
  
   //    }
     return redirect('/rapports');
 
    }
}

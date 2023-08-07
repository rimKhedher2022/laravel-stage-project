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
     // lorsque l'etudiant supprime le rapport , il reste affecté à des encadrants
     if ($rapport->stage->type=='ouvrier' || $rapport->stage->type=='technicien')
     {
      $rapport->stage->update([
         'etat'=> StageEtat::CREE
      ]) ;

      // vérifier avec 
      // si on a un stage d'été
         if($enseignants_ids){
            $rapport->stage->enseignants()->detach($enseignants_ids) ;
         }
     }
   // si le stage est pfe et sfe , les juris seront supprimé
     elseif ($rapport->stage->type == 'pfe' || $rapport->stage->type=='sfe') { 

      $role = 'president';
   
      $teachersWithRole1 = $rapport->stage->enseignants->filter(function ($enseignant) use ($role) {
          return $enseignant->pivot->role === $role;
      })->pluck('id')->toArray();
      // dd( $teachersWithRole1 );
      $rapport->stage->enseignants()->detach($teachersWithRole1) ;
      $role = 'rapporteur';
      $teachersWithRole2 = $rapport->stage->enseignants->filter(function ($enseignant) use ($role) {
          return $enseignant->pivot->role === $role;
      })->pluck('id')->toArray();
      $rapport->stage->enseignants()->detach($teachersWithRole2) ;


      $rapport->stage->update([
         'etat'=> StageEtat::AFFECTE_ENCADRANT
      ]) ;


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

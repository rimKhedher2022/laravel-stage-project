<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Societe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DataController extends Controller
{



     public function show ()
     { 
        $users = User::all() ;
        $annees = $users->pluck('annee-scolaire')->unique(); 
        return  view('pages.importer-fichier-csv',['annees'=> $annees]) ; 
     }


    public function importCSV(Request $request)
    {
        $file = $request->file('csv_file');
        $request->validate([
            'csv_file' => 'required',
            'annee' => 'required', 
        ]);
        
        if ($request->file('csv_file'))

        {
           
            Enseignant::query()->delete();
            Etudiant::query()->delete();
            User::query()->delete();
                $anneeScolaire = $request->input('annee');
                $csvData = array_map('str_getcsv', file($file));
        
            foreach ($csvData as $row) {
                if (count($row) === 11) {

                        if($anneeScolaire == $row[6] )
                        {
    
                           
                                $user = User::create([
                                
                                    'nom' => $row[0], // Replace with the appropriate column index
                                    'prenom' => $row[1], // Replace with the appropriate column index
                                    'email' => $row[2], // Replace with the appropriate column index
                                    'password' => $row[3], // Replace with the appropriate column index
                                    'role' => $row[4], // Replace with the appropriate column index
                                    'image' => $row[5], // Replace with the appropriate column index
                                    'annee-scolaire' => $row[6], // Replace with the appropriate column index
                                ]);
                                if ($row[4] == 'etudiant')
                                {
        
        
                                    Etudiant::create([
                                        'cin' => $row[7], // Replace with the appropriate column index
                                        'niveau' => $row[8], // Replace with the appropriate column index
                                        'specialite' => $row[9], // Replace with the appropriate column index
                                        'numero_inscription' => $row[10], // Replace with the appropriate column index
                                        'user_id' => $user->id, // Replace with the appropriate column index
                                    ]);
                                }
                                if ($row[4] == 'enseignant')
                                {
                                
                                    Enseignant::create([
                                        'matricule' => $row[7], 
                                        'grad' => $row[8],
                                        'user_id' => $user->id, 
                                    ]);
                                }

                           
                        }     
                        
                    } else{
                        return redirect()->back()->with('error', 'Le fichier CSV n\'est pas structuré correctement.');


                    }     
            }
         
        }     
      else {
        return redirect()->back()->with('error', 'Veuillez saisir un fichier csv.');
      }
     
        return redirect()->back()->with('message', 'doonées importés avec succes');
   
    }



    public function importSocieteCSV (Request $request)
    {

        $fileSociete = $request->file('csv_file_societe');
        if ($request->file('csv_file_societe'))
        {
            Societe::query()->delete();
            if ($fileSociete) {
                    $csvDataSociete = array_map('str_getcsv', file($fileSociete));
    
                        foreach ($csvDataSociete as $row) {
                            if (count($row) === 5) {
                                    Societe::create([
                                        'nom' => $row[0], 
                                        'ville' => $row[1], 
                                        'telephone' => $row[2], 
                                        'adresse' => $row[3], 
                                        'validation_state' => $row[4], 
                                        
                                    ]);

                                } else {    
                                    return redirect()->back()->with('error', 'Le fichier CSV n\'est pas structuré correctement.');
                                }     
                        }
            }
        } 
        else {
            return redirect()->back()->with('error', 'Veuillez saisir un fichier csv.');
        }
        
        return redirect()->back()->with('message', 'Données importés.');
       
    }
}

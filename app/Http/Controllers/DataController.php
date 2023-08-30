<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\MessageDeRappel;
use App\Models\SessionDeDepot;
use App\Models\Societe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DataController extends Controller
{



     public function show ()
     { 
        $this->authorize('viewAny', SessionDeDepot::class); // vu que par l'admin
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
           
            // Enseignant::query()->delete();
            // Etudiant::query()->delete();
            // User::query()->delete();
            //list des users fil base qui sont pas parmis le nouveau fichier csv / whereNotin
            // DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
            // DB::statement('ALTER TABLE etudiants AUTO_INCREMENT = 1');
            // DB::statement('ALTER TABLE enseignants AUTO_INCREMENT = 1');
                $anneeScolaire = $request->input('annee');
                // dd($anneeScolaire);
                $csvData = array_map('str_getcsv', file($file)); 
                $emails = array_column($csvData, '3');
                $old_users = User::whereNotIn('email',$emails)->get();
                foreach ($old_users as $userToDelete) {
                    $userToDelete->delete();
                }

          

                // delete the list
                // dd($old_users) ;
            
            foreach ($csvData as $row) {
               
                if (count($row) === 13) {
                                if($anneeScolaire == $row[7] )
                                {
            
                                $user = User::where('email', $row[3])->first(); // unique
                                    //    dd($user); 
                                if ($user)
                                {
                                        $user->update([
                                            'nom' => $row[1], // Replace with the appropriate column index
                                            'prenom' => $row[2], // Replace with the appropriate column index
                                            'password' => $row[4], // Replace with the appropriate column index
                                            'role' => $row[5], // Replace with the appropriate column index
                                            'image' => $row[6], // Replace with the appropriate column index
                                            'annee-scolaire' => $row[7], // Replace with the appropriate column index
                                        ]);

                                
                                    
                                        if ($row[5] == 'etudiant')
                                        {
                                            // dd($user->etudiant);
                                            $user->etudiant->update([
                                                'cin' => $row[8], // Replace with the appropriate column index
                                                'niveau' => $row[9], // Replace with the appropriate column index
                                                'specialite' => $row[10], // Replace with the appropriate column index
                                                'numero_inscription' => $row[11], // Replace with the appropriate column index
                                                'diplôme' => $row[12], // Replace with the appropriate column index
                                                'user_id' => $user->id, // Replace with the appropriate column index
                                            ]);
                                        }
                                        else if ($row[5] == 'enseignant') // role
                                        {
                                            $user->enseignant->update([
                                                'matricule' => $row[8], 
                                                'grad' => $row[9],
                                                'user_id' => $user->id, 
                                            ]);
                                        }

                                    }   // fin if user

                                    else{  // nouveau user

                                        $user = User::create([
                                            'nom' => $row[1], 
                                            'prenom' => $row[2], 
                                            'email' => $row[3], 
                                            'password' => $row[4], 
                                            'role' => $row[5], 
                                            'image' => $row[6], 
                                            'annee-scolaire' => $row[7], 
                                        ]);

            
                                    
                                    
                                            if ($row[5] == 'etudiant')
                                            {
                                                Etudiant::create([
                                                    'cin' => $row[8], // Replace with the appropriate column index
                                                    'niveau' => $row[9], // Replace with the appropriate column index
                                                    'specialite' => $row[10], // Replace with the appropriate column index
                                                    'numero_inscription' => $row[11], // Replace with the appropriate column index
                                                    'diplôme' => $row[12], // Replace with the appropriate column index
                                                    'user_id' => $user->id, // Replace with the appropriate column index
                                                ]);
                                            }
                                            else if ($row[5] == 'enseignant') // role
                                            {
                                                Enseignant::create([
                                                    'matricule' => $row[8], 
                                                    'grad' => $row[9],
                                                    'user_id' => $user->id, 
                                                ]);
                                            }
            

                                    }
                                
                                } 
                    } 
                    else{
                        return redirect()->back()->with('error', 'Le fichier CSV n\'est pas structuré correctement.');
                    }     
            }
         
        }     
      else {
        return redirect()->back()->with('error', 'Veuillez saisir un fichier csv.');
      }
     
        return redirect()->back()->with('message', 'Doonées importés avec succès');
   
    }



    public function importSocieteCSV (Request $request)
    {

        $fileSociete = $request->file('csv_file_societe');
        if ($request->file('csv_file_societe'))
        {
            Societe::query()->delete();
            if ($fileSociete) {
                    $csvDataSociete = array_map('str_getcsv', file($fileSociete));
                    $firstRowSkipped = false;
                        foreach ($csvDataSociete as $row) {

                            if (!$firstRowSkipped) {
                                $firstRowSkipped = true;
                                continue; // Skip the first row
                            }

                            
                            if (count($row) === 9) {
                                    Societe::create([
                                        'nom' => $row[1], 
                                        'ville' => $row[2], 
                                        'telephone' => $row[3], 
                                        'adresse' => $row[4], 
                                        'validation_state' => $row[5], 
                                        'pays' => $row[6], 
                                        'fax' => $row[7], 
                                        'email' => $row[8],   
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

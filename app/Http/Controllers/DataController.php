<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DataController extends Controller
{



     public function show ()
     { 
        $users = User::all() ;
        $annees = $users->pluck('annee-scolaire')->unique(); 
        return  view('pages.exporter-fichier-csv',['annees'=> $annees]) ; 
     }


    public function exportToCSV(Request $request)
    {
        // Fetch data from the database
       if($request->user == 'etudiant')
       {
        
     
        // $etudiant = Etudiant::where('user_id',auth()->id())->first(); // 4
        $data = User::where('annee-scolaire',$request->annee)->where('role','etudiant')->get(); // Replace TableName with your model name if using one
      

        // Define CSV file name and headers
        $filename = 'data.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Create a CSV file using Laravel's built-in CSV response
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            // Add headers to the CSV file
            fputcsv($file, array_keys($data[0]->toArray()));

            // Add data to the CSV file
            foreach ($data as $row) {
                fputcsv($file, $row->toArray());
            }

            fclose($file);
        };

        // Return the CSV file as a response
        return Response::stream($callback, 200, $headers);
    }
    else
    {

        $data = User::where('annee-scolaire',$request->annee)->where('role','enseignant')->get(); // Replace TableName with your model name if using one
      

        // Define CSV file name and headers
        $filename = 'data.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Create a CSV file using Laravel's built-in CSV response
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            // Add headers to the CSV file
            fputcsv($file, array_keys($data[0]->toArray()));

            // Add data to the CSV file
            foreach ($data as $row) {
                fputcsv($file, $row->toArray());
            }

            fclose($file);
        };

        // Return the CSV file as a response
        return Response::stream($callback, 200, $headers);


    }
    }
}

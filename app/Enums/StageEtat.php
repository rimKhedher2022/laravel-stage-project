<?php
  
namespace App\Enums;
 
enum StageEtat:string {
 
    case CREE = 'crée';
    case DEPOSE = 'rapport déposé';
    case AFFECTE = 'affecté à un enseignant'; // admin
  
    case AFFECTE_ENCADRANT = 'affecté à un encadrant'; // admin
    case AFFECTE_ENCADRANTS = 'affecté aux encadrants'; // admin

    case AFFECTE_J = 'affecté aux jurys'; // admin
    case CORRIGE = 'rapport vérifié et corrigé'; // admin
    case VALIDE = 'validé'; // admin
    case NON_VALIDE = 'non validé'; // admin
    

}
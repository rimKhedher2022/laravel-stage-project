<?php
  
namespace App\Enums;
 
enum StageEtat:string {
 
    case CREE = 'crée';
    case DEPOSE = 'rapport déposé';
    case AFFECTE = 'affecté à un enseignant'; // admin
    case CORRIGE = 'rapport vérifié et corrigé'; // admin
    case VALIDE = 'validé'; // admin
    case NON_VALIDE = 'non validé'; // admin
    

}
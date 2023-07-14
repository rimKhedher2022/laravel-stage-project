<?php
  
namespace App\Enums;
 
enum StageEtat:string {
 
    case CREE = 'crée';
    case DEPOSE = 'rapport déposé';
    case AFFECTE = 'affecté à un enseignant';
    case CORRIGE = 'rapport vérifié et corrigé';
    case VALIDE = 'validé';
    case NON_VALIDE = 'non validé';
    

}
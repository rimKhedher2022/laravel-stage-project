<?php
  
namespace App\Enums;
 
enum StageEtat:string {
 
    case CREE = 'crée';
    case AFFECTE = 'affecté à un enseignant';
    case DEPOSE = 'rapport déposé';
    case VALIDE = 'validé';
    case NON_VALIDE = 'non validé';
    

}
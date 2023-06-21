<?php
  
namespace App\Enums;
 
enum RoleType:string {
    case Administrateur = 'administrateur';
    case Etudiant = 'etudiant';
    case Enseignant = 'enseignant';

}
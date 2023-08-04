<?php
  
namespace App\Enums;
 
enum StageType:string {
    case Ouvrier = 'ouvrier';
    case Technicien = 'technicien';
    case PFE = 'pfe';
    case SFE = 'sfe';
    

}
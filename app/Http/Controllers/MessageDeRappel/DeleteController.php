<?php

namespace App\Http\Controllers\MessageDeRappel;

use App\Http\Controllers\Controller;
use App\Models\MessageDeRappel;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)  // une seule fonction
   {
    $message = MessageDeRappel::find($id);
    $message->delete() ;
    return 'ok';

   }
}

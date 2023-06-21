<?php

namespace App\Http\Controllers\Administrateur;

use App\Enums\RoleType;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()  // une seul fonction
   {
    // return User::all()->filter(RoleType::class=>'administrateur');
    return User::where('role',RoleType::Administrateur)->get(); // select 


   }
}

<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UserUpdateRequest $request, $id) // une seule fonction
    {

     $user=User::find($id);
  
     
     $user->update(
        //  'nom' => $request->nom ,
        //  'prenom' =>$request->prenom  ,
        //  'email' =>$request->email  ,
        //  'role' =>$request->role  ,
        //  'password' => Hash::make($request->password) ,
        $request->all()
     );
   
     return   $user;
 
    }
}

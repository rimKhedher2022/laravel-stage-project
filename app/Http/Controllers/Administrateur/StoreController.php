<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministrateurStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(UserStoreRequest $request) {
        $user = User::create([
            'nom' => $request->nom ,
            'prenom' =>$request->prenom  ,
            'email' =>$request->email ,
            'role' =>$request->role ,
            'password' => Hash::make($request->password) ,
        ]);
        return $user ;
    }
}

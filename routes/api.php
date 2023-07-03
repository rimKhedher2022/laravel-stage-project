<?php

use App\Http\Controllers\Administrateur\DeleteController as AdministrateurDeleteController;
use App\Http\Controllers\Administrateur\IndexController as AdministrateurIndexController;
use App\Http\Controllers\Administrateur\ShowController as AdministrateurShowController;
use App\Http\Controllers\Administrateur\StoreController as AdministrateurStoreController;
use App\Http\Controllers\Administrateur\UpdateController as AdministrateurUpdateController;
use App\Http\Controllers\Enseignant\DeleteController as EnseignantDeleteController;
use App\Http\Controllers\Enseignant\IndexController;
use App\Http\Controllers\Enseignant\ShowController;
use App\Http\Controllers\Enseignant\StoreController as EnseignantStoreController;
use App\Http\Controllers\Enseignant\UpdateController as EnseignantUpdateController;
use App\Http\Controllers\Etudiant\DeleteController;
use App\Http\Controllers\Etudiant\IndexController as IndexEtudiantController;
use App\Http\Controllers\Etudiant\ShowController  as ShowEtudiantController;
use App\Http\Controllers\Etudiant\StoreController;
use App\Http\Controllers\Etudiant\UpdateController;
use App\Http\Controllers\MessageDeRappel\DeleteController as MessageDeRappelDeleteController;
use App\Http\Controllers\MessageDeRappel\IndexController as MessageDeRappelIndexController;
use App\Http\Controllers\MessageDeRappel\ShowController as MessageDeRappelShowController;
use App\Http\Controllers\MessageDeRappel\StoreController as MessageDeRappelStoreController;
use App\Http\Controllers\MessageDeRappel\UpdateController as MessageDeRappelUpdateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rapport\DeleteController as RapportDeleteController;
use App\Http\Controllers\Rapport\IndexController as RapportIndexController;
use App\Http\Controllers\Rapport\ShowController as RapportShowController;
use App\Http\Controllers\Rapport\StoreController as RapportStoreController;
use App\Http\Controllers\Rapport\UpdateController as RapportUpdateController;
use App\Http\Controllers\SessionDeDepot\DeleteController as SessionDeDepotDeleteController;
use App\Http\Controllers\SessionDeDepot\IndexController as SessionDeDepotIndexController;
use App\Http\Controllers\SessionDeDepot\ShowController as SessionDeDepotShowController;
use App\Http\Controllers\SessionDeDepot\StoreController as SessionDeDepotStoreController;
use App\Http\Controllers\SessionDeDepot\UpdateController as SessionDeDepotUpdateController;
use App\Http\Controllers\Societe\DeleteController as SocieteDeleteController;
use App\Http\Controllers\Societe\IndexController as SocieteIndexController;
use App\Http\Controllers\Societe\ShowController as SocieteShowController;
use App\Http\Controllers\Societe\StoreController as SocieteStoreController;
use App\Http\Controllers\Societe\UpdateController as SocieteUpdateController;
use App\Http\Controllers\Stage\DeleteController as StageDeleteController;
use App\Http\Controllers\Stage\IndexController as StageIndexController;
use App\Http\Controllers\Stage\ShowController as StageShowController;
use App\Http\Controllers\Stage\StoreController as StageStoreController;
use App\Http\Controllers\Stage\UpdateController as StageUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('etudiants')->group(function () {
    Route::get('/',IndexEtudiantController::class);
    Route::get('/{id}',ShowEtudiantController::class);
    Route::post('/',StoreController::class);
    Route::delete('/{id}',DeleteController::class);
    Route::post('/{id}',UpdateController::class);
});

Route::prefix('enseignants')->group(function () {
    Route::get('/',IndexController::class);
    Route::get('/{id}',ShowController::class);
    Route::post('/',EnseignantStoreController::class);
    Route::delete('/{id}',EnseignantDeleteController::class);
    Route::post('/{id}',EnseignantUpdateController::class);
});
Route::prefix('administrateurs')->group(function () {
    Route::get('/',AdministrateurIndexController::class);
    Route::get('/{id}',AdministrateurShowController::class);
    Route::post('/',AdministrateurStoreController::class);
    Route::delete('/{id}',AdministrateurDeleteController::class);
    Route::post('/{id}',AdministrateurUpdateController::class);
});
Route::middleware('auth')->group(function(){
    
    Route::prefix('stages')->group(function () {
        Route::get('/',StageIndexController::class);
        Route::get('/{id}',StageShowController::class);
       //Route::post('/',[StageStoreController::class,'store']);
        Route::delete('/{id}',StageDeleteController::class);
        Route::post('/{id}',StageUpdateController::class);
    });

});

// Route::prefix('societes')->group(function () {
//     Route::get('/',SocieteIndexController::class);
//     Route::get('/{id}',SocieteShowController::class);
//     Route::post('/',SocieteStoreController::class);
//     Route::delete('/{id}',SocieteDeleteController::class);
//     Route::post('/{id}',SocieteUpdateController::class);
// });
Route::prefix('rapports')->group(function () {
    Route::get('/',RapportIndexController::class);
    Route::get('/{id}',RapportShowController::class);
    Route::post('/',RapportStoreController::class);
    Route::delete('/{id}',RapportDeleteController::class);
    Route::post('/{id}',RapportUpdateController::class);
});
Route::prefix('sessionsDeDepot')->group(function () {
    Route::get('/',SessionDeDepotIndexController::class);
    Route::get('/{id}',SessionDeDepotShowController::class);
    Route::post('/',SessionDeDepotStoreController::class);
    Route::delete('/{id}',SessionDeDepotDeleteController::class);
    Route::post('/{id}',SessionDeDepotUpdateController::class);
});

Route::prefix('messagesDeRappel')->group(function () {
    Route::get('/',MessageDeRappelIndexController::class);
    Route::get('/{id}',MessageDeRappelShowController::class);
    Route::post('/',MessageDeRappelStoreController::class);
    Route::delete('/{id}',MessageDeRappelDeleteController::class);
    Route::post('/{id}',MessageDeRappelUpdateController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

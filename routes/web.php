<?php

use App\Http\Controllers\Enseignant\DeleteController;
use App\Http\Controllers\Enseignant\IndexController;
use App\Http\Controllers\Enseignant\ShowController;
use App\Http\Controllers\Enseignant\StoreController as EnseignantStoreController;
use App\Http\Controllers\Etudiant\IndexController as IndexEtudiantController;
use App\Http\Controllers\Etudiant\ShowController  as ShowEtudiantController;
use App\Http\Controllers\Etudiant\StoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('etudiants')->group(function () {
    Route::get('/',IndexEtudiantController::class);
    Route::get('/{id}',ShowEtudiantController::class);
    Route::post('/',StoreController::class);
});

Route::prefix('enseignants')->group(function () {
    Route::get('/',IndexController::class);
    Route::get('/{id}',ShowController::class);
    Route::post('/',EnseignantStoreController::class);
    Route::delete('/{id}',DeleteController::class);
   // Route::put('/{id}',EnseignantUpdateController::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

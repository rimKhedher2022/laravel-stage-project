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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\Societe\DeleteController as SocieteDeleteController;
use App\Http\Controllers\Societe\EditController as SocieteEditController;
use App\Http\Controllers\Societe\IndexController as SocieteIndexController;
use App\Http\Controllers\Societe\StoreController as SocieteStoreController;
use App\Http\Controllers\Societe\UpdateController as SocieteUpdateController;
use App\Http\Controllers\Stage\DeleteController as StageDeleteController;
use App\Http\Controllers\Stage\EditController;
use App\Http\Controllers\Stage\IndexController as StageIndexController;
use App\Http\Controllers\Stage\StoreController as StageStoreController;
use App\Http\Controllers\Stage\UpdateController;

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
// Route::prefix('etudiants')->group(function () {
//     Route::get('/',IndexEtudiantController::class);
//     Route::get('/{id}',ShowEtudiantController::class);
//     Route::post('/',StoreController::class);
// });

// Route::prefix('enseignants')->group(function () {
//     Route::get('/',IndexController::class);
//     Route::get('/{id}',ShowController::class);
//     Route::post('/',EnseignantStoreController::class);
//     Route::delete('/{id}',DeleteController::class);
//    // Route::put('/{id}',EnseignantUpdateController::class);
// });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	Route::get('/add-stage',[StageStoreController::class,'show'])->name('add-stage');
	Route::get('/stages/{id}',EditController::class)->name('edit-stage');
	Route::post('/stages/{id}',UpdateController::class)->name('stages.update');
	Route::get('/stages',StageIndexController::class)->name('stages');
	Route::delete('/stages/{id}',StageDeleteController::class)->name('stages.delete');
	Route::post('/',[StageStoreController::class,'store'])->name('stage.store');

	Route::get('/add-societe',[SocieteStoreController::class,'show'])->name('add-societe');
	Route::post('/ok',[SocieteStoreController::class,'store'])->name('societe.store');
	Route::get('/societes',SocieteIndexController::class)->name('societes');
	Route::delete('/societes/{id}',SocieteDeleteController::class)->name('societes.delete');
	Route::get('/societes/{id}',SocieteEditController::class)->name('edit-societe');
	Route::post('/societes/{id}',SocieteUpdateController::class)->name('societes.update');

	// Etudiant routes
	// Route::prefix('etudiants')->group(function () {
		
	

	// }
// );

	


});


require __DIR__.'/auth.php';
Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});



       
            


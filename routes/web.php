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
use App\Http\Controllers\MessageDeRappel\DeleteController as MessageDeRappelDeleteController;
use App\Http\Controllers\MessageDeRappel\EditController as MessageDeRappelEditController;
use App\Http\Controllers\MessageDeRappel\IndexController as MessageDeRappelIndexController;
use App\Http\Controllers\MessageDeRappel\IndexMessagesEtudiantsController;
use App\Http\Controllers\MessageDeRappel\StoreController as MessageDeRappelStoreController;
use App\Http\Controllers\MessageDeRappel\UpdateController as MessageDeRappelUpdateController;
use App\Http\Controllers\Rapport\DeleteController as RapportDeleteController;
use App\Http\Controllers\Rapport\EditController as RapportEditController;
use App\Http\Controllers\Rapport\IndexController as RapportIndexController;
use App\Http\Controllers\Rapport\StoreController as RapportStoreController;
use App\Http\Controllers\Rapport\UpdateController as RapportUpdateController;
use App\Http\Controllers\SessionDeDepot\DeleteController as SessionDeDepotDeleteController;
use App\Http\Controllers\SessionDeDepot\EditController as SessionDeDepotEditController;
use App\Http\Controllers\SessionDeDepot\IndexController as SessionDeDepotIndexController;
use App\Http\Controllers\SessionDeDepot\StoreController as SessionDeDepotStoreController;
use App\Http\Controllers\SessionDeDepot\UpdateController as SessionDeDepotUpdateController;
use App\Http\Controllers\Societe\DeleteController as SocieteDeleteController;
use App\Http\Controllers\Societe\EditController as SocieteEditController;
use App\Http\Controllers\Societe\IndexController as SocieteIndexController;
use App\Http\Controllers\Societe\StoreController as SocieteStoreController;
use App\Http\Controllers\Societe\UpdateController as SocieteUpdateController;
use App\Http\Controllers\Stage\DatesSoutenancesController;
use App\Http\Controllers\Stage\DeleteController as StageDeleteController;
use App\Http\Controllers\Stage\EditController;
use App\Http\Controllers\Stage\IndexController as StageIndexController;
use App\Http\Controllers\Stage\StageAffectationController;
use App\Http\Controllers\Stage\StageAvaliderController;
use App\Http\Controllers\Stage\StageSansDepotController;
use App\Http\Controllers\Stage\StoreController as StageStoreController;
use App\Http\Controllers\Stage\UpdateController;
use App\Http\Controllers\Utilisateur\DeleteController as UtilisateurDeleteController;
use App\Http\Controllers\Utilisateur\EditController as UtilisateurEditController;
use App\Http\Controllers\Utilisateur\IndexController as UtilisateurIndexController;
use App\Http\Controllers\Utilisateur\UpdateController as UtilisateurUpdateController;

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
	Route::get('/stages/{id}',[EditController::class, 'edit'])->name('edit-stage');
	Route::get('/stages/affecter/{id}',[EditController::class, 'affecter'])->name('affecter-stage');
	Route::get('/stages/soutenance/{id}',[EditController::class, 'choisirSoutenance'])->name('soutenance-stage'); //?????
	// Route::get('/stages/affecter/{id}',EditController::class)->name('edit-stage'); // admin
	Route::post('/stages/{id}',[UpdateController::class, 'update'])->name('stages.update');
	Route::post('/stages/affecter/{id}',[UpdateController::class, 'affecter'])->name('stages.affecter'); // admin
	Route::post('/stages/soutenance/{id}',[UpdateController::class, 'choisirSoutenance'])->name('stages.soutenance'); //?????
	Route::get('/stages',StageIndexController::class)->name('stages');
	Route::get('/soutenances',DatesSoutenancesController::class)->name('soutenances');
	Route::get('/stages-a-valider',StageAvaliderController::class)->name('stages-valider');
	Route::get('/stages-affectes',StageAffectationController::class)->name('stages-affectes');
	Route::get('/stages-sans-depots',StageSansDepotController::class)->name('stages-sans-depots');
	Route::delete('/stages/{id}',StageDeleteController::class)->name('stages.delete');
	Route::post('/',[StageStoreController::class,'store'])->name('stage.store');

	Route::get('/add-societe',[SocieteStoreController::class,'show'])->name('add-societe');
	Route::post('/ok',[SocieteStoreController::class,'store'])->name('societe.store');
	Route::get('/societes',SocieteIndexController::class)->name('societes');
	Route::delete('/societes/{id}',SocieteDeleteController::class)->name('societes.delete');
	Route::get('/societes/{id}',SocieteEditController::class)->name('edit-societe');
	Route::post('/societes/{id}',SocieteUpdateController::class)->name('societes.update');

	Route::get('/enseignants',IndexController::class)->name('enseignants');

	Route::get('/add-session',[SessionDeDepotStoreController::class,'show'])->name('add-session');
	Route::post('/okk',[SessionDeDepotStoreController::class,'store'])->name('session.store');
	Route::get('/sessions',SessionDeDepotIndexController::class)->name('sessions');
	Route::get('/sessions/{id}',SessionDeDepotEditController::class)->name('edit-session');
	Route::post('/sessions/{id}',SessionDeDepotUpdateController::class)->name('sessions.update');
	Route::delete('/sessions/{id}',SessionDeDepotDeleteController::class)->name('sessions.delete');

	Route::get('/add-rapport/{id}',[RapportStoreController::class,'show'])->name('add-rapport');
	Route::post('/store/{stage_id}',[RapportStoreController::class,'store'])->name('rapport.store');
	Route::get('/rapports',RapportIndexController::class)->name('rapports');
	Route::get('/rapports/{id}',RapportEditController::class)->name('edit-rapport');
	Route::post('/rapports/{id}',RapportUpdateController::class)->name('rapports.update');
	Route::delete('/rapports/{id}',RapportDeleteController::class)->name('rapports.delete');
    Route::get('/download/{file}',[RapportStoreController::class,'fordownload'])->name('down');
	Route::post('/valider-rapport/{rapport_id}',[RapportStoreController::class,'valider'])->name('rapport.valider');  //  ???????
	Route::post('/annuler-valider-rapport/{rapport_id}',[RapportStoreController::class,'annulerValidation'])->name('rapport.annulervalidation');  //  ???????
	Route::post('/valider-stage/{id}',[UpdateController::class,'valider'])->name('stages.valider');  //  ???????
	Route::post('/annuler-validation-stage/{id}',[UpdateController::class,'annulerValidation'])->name('stages.annulerValidation');  //  ???????

	Route::get('/user-management',UtilisateurIndexController::class)->name('user-management'); // users
	Route::get('/users/{id}',UtilisateurEditController::class)->name('edit-user');
	Route::post('/users/{id}',UtilisateurUpdateController::class)->name('users.update');
	Route::delete('/users/{id}',UtilisateurDeleteController::class)->name('users.delete');



	// Route::get('/add-message/{id}',[MessageDeRappelStoreController::class,'show'])->name('add-message');
	Route::post('/store-message/{id}',[MessageDeRappelStoreController::class,'store'])->name('message.store');
	Route::post('/send-message/{id}',[MessageDeRappelStoreController::class,'send'])->name('message.send'); // enseignant
	Route::get('/add-message/{id}',[MessageDeRappelStoreController::class,'show'])->name('add-message');
	// Route::post('/add-message/{id}',[MessageDeRappelStoreController::class,'envoyer'])->name('message.envoyer');
	
	Route::get('/messages/{id}',MessageDeRappelEditController::class)->name('edit-message');
	Route::post('/messages/{id}',MessageDeRappelUpdateController::class)->name('messages.update');
	
	Route::delete('/messages/{id}',MessageDeRappelDeleteController::class)->name('messages.delete');
	Route::get('/messages',[MessageDeRappelIndexController::class,'messagesAdministrateur'])->name('messages');
	Route::get('/messages-etudiants',[IndexMessagesEtudiantsController::class,'messagesEtudiant'])->name('messages-etudiants');

	// Route::get('/valider-stages',StageIndexController::class)->name('valider-stages');
	
	// Etudiant routes
	// Route::prefix('etudiants')->group(function () {
		
	

	// }
// );

	


});


require __DIR__.'/auth.php';
Route::get('/', function () {return redirect('/profile');})->middleware('auth');
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



       
            


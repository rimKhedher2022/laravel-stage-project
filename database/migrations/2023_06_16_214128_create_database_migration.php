<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//         Schema::create('sessions', function (Blueprint $table) {
//             $table->id();
//             $table->string('annee_scolaire');/* */ 
//             $table->date('date_debut');/* */ 
//             $table->date('date_fin');/* */       
//             $table->timestamps();
//         });

//  // les etudiants

       

// /* Employes */
//         Schema::create('admins', function (Blueprint $table) {
//             $table->id();
//             $table->string('nom');
//             $table->string('prenom');
//             $table->string('email')->unique();
//             $table->string('image')->nullable(); 
//             $table->string('password');
//             $table->timestamps();
//         });

// // un enseignant valide plusieurs stage et un stage est validé par un seul enseignant
//         Schema::create('enseignants', function (Blueprint $table) {
//             $table->id();
//             $table->string('matricule')->nullable();
//             $table->string('nom');
//             $table->string('prenom');
//             $table->string('email')->unique();
//             $table->string('image')->nullable();
//             $table->string('password');
//             $table->timestamps();
//         });

//         Schema::create('societes', function (Blueprint $table) {
//             $table->id();
//             $table->string('nom');
//             $table->string('telephone');
//             $table->string('adresse');
//             $table->timestamps();
//         });

//         Schema::create('stages', function (Blueprint $table) {
//             $table->id();
//             $table->enum('type', ['ouvrier', 'technicien','pfe'])->default('ouvrier');
//             $table->date('date_debut');
//             $table->date('date_fin');
//             $table->string('sujet');
//             $table->string('etat');
//             $table->date('date_soutenance')->nullable();
//             $table->foreignId('societe_id')->constrained('societes')->onUpdate('cascade')->onDelete('cascade');
//            // $table->foreignId('rapport_id')->constrained('rapports')->onUpdate('cascade')->onDelete('cascade');
//             $table->timestamps();
//         });

      
// // Responsablité des enseignants qui vont valider les stages
//         Schema::create('enseignant_stages', function (Blueprint $table) {
//             $table->id();
//             $table->string('role');
//             $table->foreignId('stage_id')->constrained('stages')->onUpdate('cascade')->onDelete('cascade');
//             $table->foreignId('enseignant_id')->constrained('enseignants')->onUpdate('cascade')->onDelete('cascade');
//             $table->timestamps();
//         });

        
//         Schema::create('rapports', function (Blueprint $table) {
//             $table->id();
//             $table->string('Titre');
//             $table->foreignId('stage_id')->constrained('stages')->onUpdate('cascade')->onDelete('cascade');
//             $table->string('filePath');
//             $table->date('date_depot');
//             $table->timestamps();
//         });


//     Schema::create('user_stages', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
//             $table->foreignId('stage_id')->constrained('stages')->onUpdate('cascade')->onDelete('cascade');
//             $table->timestamps();
//         }); 
//     Schema::create('SessionDepot', function (Blueprint $table) {
//             $table->id();
//             $table->date('date_debut');
//             $table->date('date_fin');
//             $table->foreignId('admin_id')->constrained('admins')->onUpdate('cascade')->onDelete('cascade');
//             $table->timestamps();
//         }); 
//     Schema::create('MessageDeRappel', function (Blueprint $table) {
//             $table->id();
//             $table->string('titre');
//             $table->string('description');
//             $table->foreignId('admin_id')->constrained('admins')->onUpdate('cascade')->onDelete('cascade');
//             $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
//             $table->timestamps();
//         }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('users');
        // Schema::dropIfExists('admins');
        // Schema::dropIfExists('enseignants');
        // Schema::dropIfExists('rapports');
        // Schema::dropIfExists('societes');
        // Schema::dropIfExists('stages');
        // Schema::dropIfExists('enseignant_stages');
        // Schema::dropIfExists('rapports');
        // Schema::dropIfExists('user_stages');
        // Schema::dropIfExists('SessionDepot');
        // Schema::dropIfExists('MessageDeRappel');  
    }
};

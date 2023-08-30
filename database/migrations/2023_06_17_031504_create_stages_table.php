<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['ouvrier', 'technicien', 'pfe','sfe'])->default('ouvrier');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('sujet');
            $table->enum('etat', ['crée', 'rapport déposé', 'affecté à un enseignant','affecté à un encadrant','affecté aux encadrants','affecté aux jurys' ,'rapport vérifié et corrigé','validé' , 'non validé'])->default('crée');
            $table->date('date_soutenance')->nullable();
            $table
                ->foreignId('societe_id')
                ->constrained('societes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
           
            // le id du binome
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};

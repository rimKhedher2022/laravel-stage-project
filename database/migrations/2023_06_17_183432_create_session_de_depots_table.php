<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // code ajouté - 17/06/2023
        Schema::create('session_de_depots', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');  
            $table->enum('type_stage', ['Été', 'PFE', 'SFE'])->default('Été');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_de_depots');
    }
};

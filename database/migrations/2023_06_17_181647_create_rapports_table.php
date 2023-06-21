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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('titre'); //??
            $table->foreignId('stage_id')->constrained('stages')->onUpdate('cascade')->onDelete('cascade');
            $table->string('filePath');
            $table->date('date_depot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};

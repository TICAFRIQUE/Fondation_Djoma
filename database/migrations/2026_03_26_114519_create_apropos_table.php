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
        Schema::create('apropos', function (Blueprint $table) {
            $table->id();
            $table->string('image');             // Chemin de l'image (requis)
            $table->string('title')->nullable(); // Titre (optionnel)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apropos');
    }
};
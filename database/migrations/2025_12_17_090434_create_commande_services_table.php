<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('commande_services', function (Blueprint $table) {
            $table->id();
            $table->string('statut');
            $table->string('nomprenoms')->nullable();
            $table->string('fonction')->nullable();
            $table->string('societe')->nullable();
            $table->string('tel');

            $table->string('service');
            $table->string('domaine')->nullable();
            $table->string('hebergement')->nullable();

            $table->string('emailc');
            $table->string('telc');

            $table->text('complementaire')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_services');
    }
};

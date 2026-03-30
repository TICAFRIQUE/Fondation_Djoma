<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('image')->nullable();

            $table->string('status')->default('en_cours');
            // en_cours | financement | bientot

            $table->integer('progress')->default(0); // %

            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();

            $table->integer('order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};

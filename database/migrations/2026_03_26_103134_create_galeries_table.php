<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();

            $table->string('path', 500); // plus sécurisé pour chemins longs

            $table->string('type')->default('image'); 
            // image | video (plus flexible que enum)

            $table->integer('position')->default(0); 
            // pour trier les images

            $table->timestamps();

            // index (performance)
            $table->index('type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};
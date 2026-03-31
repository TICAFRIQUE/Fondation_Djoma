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
    Schema::create('sliders', function (Blueprint $table) {
        $table->id();
        $table->string('badge')->nullable();
        $table->string('title');
        $table->string('highlight')->nullable(); // texte en <span>
        $table->text('description')->nullable();

        $table->string('btn1_text')->nullable();
        $table->string('btn1_link')->nullable();

        $table->string('btn2_text')->nullable();
        $table->string('btn2_link')->nullable();

        $table->string('image')->nullable();

        $table->json('stats')->nullable(); // stats dynamiques

        $table->integer('order')->default(0);
        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};

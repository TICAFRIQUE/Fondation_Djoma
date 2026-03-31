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
        Schema::table('apropos', function (Blueprint $table) {
            // Ajouter les colonnes manquantes
            if (!Schema::hasColumn('apropos', 'description')) {
                $table->text('description')->nullable()->after('title');
            }
            if (!Schema::hasColumn('apropos', 'stat_1_value')) {
                $table->string('stat_1_value')->nullable()->after('image');
            }
            if (!Schema::hasColumn('apropos', 'stat_1_label')) {
                $table->string('stat_1_label')->nullable()->after('stat_1_value');
            }
            if (!Schema::hasColumn('apropos', 'stat_2_value')) {
                $table->string('stat_2_value')->nullable()->after('stat_1_label');
            }
            if (!Schema::hasColumn('apropos', 'stat_2_label')) {
                $table->string('stat_2_label')->nullable()->after('stat_2_value');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apropos', function (Blueprint $table) {
            $table->dropColumnIfExists('description');
            $table->dropColumnIfExists('stat_1_value');
            $table->dropColumnIfExists('stat_1_label');
            $table->dropColumnIfExists('stat_2_value');
            $table->dropColumnIfExists('stat_2_label');
        });
    }
};

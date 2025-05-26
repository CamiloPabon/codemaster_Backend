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
        Schema::create('stadistic_has_ranking', function (Blueprint $table) {
            $table->integer('stadistic_idstadistic');
            $table->unsignedBigInteger('stadistic_challenge_id');
            $table->integer('RANKING_idRANKING')->index('fk_stadistic_has_ranking_ranking1_idx');

            $table->index(['stadistic_idstadistic', 'stadistic_challenge_id'], 'fk_stadistic_has_ranking_stadistic1_idx');
            $table->primary(['stadistic_idstadistic', 'stadistic_challenge_id', 'RANKING_idRANKING']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadistic_has_ranking');
    }
};

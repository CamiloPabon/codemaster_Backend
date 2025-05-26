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
        Schema::table('stadistic_has_ranking', function (Blueprint $table) {
            $table->foreign(['RANKING_idRANKING'], 'fk_stadistic_has_RANKING_RANKING1')->references(['idRANKING'])->on('ranking')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['stadistic_idstadistic', 'stadistic_challenge_id'], 'fk_stadistic_has_RANKING_stadistic1')->references(['idstadistic', 'challenge_id'])->on('stadistic')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stadistic_has_ranking', function (Blueprint $table) {
            $table->dropForeign('fk_stadistic_has_RANKING_RANKING1');
            $table->dropForeign('fk_stadistic_has_RANKING_stadistic1');
        });
    }
};

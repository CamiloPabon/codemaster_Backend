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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['rol_idROLES'], 'fk_users_rol1')->references(['idROLES'])->on('rol')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['stadistic_idstadistic', 'stadistic_challenge_id'], 'fk_users_stadistic1')->references(['idstadistic', 'challenge_id'])->on('stadistic')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_rol1');
            $table->dropForeign('fk_users_stadistic1');
        });
    }
};

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
        Schema::table('stadistic', function (Blueprint $table) {
            $table->foreign(['challenge_id'], 'fk_stadistic_challenge1')->references(['id'])->on('challenge')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stadistic', function (Blueprint $table) {
            $table->dropForeign('fk_stadistic_challenge1');
        });
    }
};

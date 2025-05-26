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
        Schema::create('stadistic', function (Blueprint $table) {
            $table->integer('idstadistic');
            $table->string('TIEMPO', 45);
            $table->string('CODIGO', 45);
            $table->string('LINEAS_CODIGO', 45);
            $table->string('COMPILACIONES', 45);
            $table->string('idRANKING', 45);
            $table->unsignedBigInteger('challenge_id')->index('fk_stadistic_challenge1_idx');

            $table->primary(['idstadistic', 'challenge_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadistic');
    }
};

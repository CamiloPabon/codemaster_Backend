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
        Schema::create('classrom', function (Blueprint $table) {
            $table->integer('idCLASSROMS');
            $table->string('RETOS', 45)->nullable();
            $table->string('CLASSROMScol', 45)->nullable();
            $table->unsignedBigInteger('challenge_id')->index('fk_classrom_challenge1_idx');

            $table->primary(['idCLASSROMS', 'challenge_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrom');
    }
};

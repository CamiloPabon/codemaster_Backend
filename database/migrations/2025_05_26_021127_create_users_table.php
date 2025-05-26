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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('rol_idROLES')->index('fk_users_rol1_idx');
            $table->integer('stadistic_idstadistic');
            $table->unsignedBigInteger('stadistic_challenge_id');

            $table->index(['stadistic_idstadistic', 'stadistic_challenge_id'], 'fk_users_stadistic1_idx');
            $table->primary(['id', 'rol_idROLES', 'stadistic_idstadistic', 'stadistic_challenge_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

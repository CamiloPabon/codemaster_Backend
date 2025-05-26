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
        Schema::create('classrom_has_users', function (Blueprint $table) {
            $table->integer('classrom_idCLASSROMS')->index('fk_classrom_has_users_classrom1_idx');
            $table->unsignedBigInteger('users_id');
            $table->integer('users_rol_idROLES');

            $table->index(['users_id', 'users_rol_idROLES'], 'fk_classrom_has_users_users1_idx');
            $table->primary(['classrom_idCLASSROMS', 'users_id', 'users_rol_idROLES']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrom_has_users');
    }
};

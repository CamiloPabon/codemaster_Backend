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
        Schema::table('classrom_has_users', function (Blueprint $table) {
            $table->foreign(['classrom_idCLASSROMS'], 'fk_classrom_has_users_classrom1')->references(['idCLASSROMS'])->on('classrom')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['users_id', 'users_rol_idROLES'], 'fk_classrom_has_users_users1')->references(['id', 'rol_idROLES'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classrom_has_users', function (Blueprint $table) {
            $table->dropForeign('fk_classrom_has_users_classrom1');
            $table->dropForeign('fk_classrom_has_users_users1');
        });
    }
};

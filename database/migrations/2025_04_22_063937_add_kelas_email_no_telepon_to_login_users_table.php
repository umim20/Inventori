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
        Schema::table('login_users', function (Blueprint $table) {
            $table->string('kelas')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('email')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('login_users', function (Blueprint $table) {
            //
        });
    }
};

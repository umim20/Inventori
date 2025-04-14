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
        Schema::table('histori_peminjamen', function (Blueprint $table) {
            $table->enum('status', ['pinjam', 'kembali'])->default('pinjam');
            $table->dateTime('tanggal_kembali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('histori', function (Blueprint $table) {
            //
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('histori_peminjaman', function (Blueprint $table) {
            $table->timestamp('tanggal_kembali')->nullable(); // Menambahkan kolom tanggal_kembali
        });
    }

    public function down()
    {
        Schema::table('histori_peminjaman', function (Blueprint $table) {
            $table->dropColumn('tanggal_kembali');
        });
    }

};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDaftarBarangColumnInInventarisTable extends Migration
{
    public function up()
    {
        Schema::table('inventaris', function (Blueprint $table) {
            // Mengubah kolom 'daftar_barang' menjadi tipe JSON
            $table->json('daftar_barang')->change();
        });
    }

    public function down()
    {
        Schema::table('inventaris', function (Blueprint $table) {
            // Jika Anda ingin mengembalikannya, ubah ke tipe lama
            $table->text('daftar_barang')->change();
        });
    }
}

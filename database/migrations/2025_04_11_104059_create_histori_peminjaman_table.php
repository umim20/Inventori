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
        Schema::create('histori_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nim'); // user yang meminjam
            $table->unsignedBigInteger('barang_id');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->enum('status', ['dipinjam', 'dikembalikan']);
            $table->timestamps();
        
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_peminjaman');
    }
};

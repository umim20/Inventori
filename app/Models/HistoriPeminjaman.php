<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'histori_peminjaman';

    protected $fillable = [
        'nim',
        'barang_id',
        'nama_barang',
        'jumlah',
        'status',
        'tanggal_kembali', // ← tambahkan ini kalau field ini ada di database!
    ];
}

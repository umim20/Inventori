<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'stok',
        'deskripsi',
    ];

    public function detailPeminjaman()
{
    return $this->hasMany(DetailPeminjaman::class);
}

}

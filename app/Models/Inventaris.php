<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama', 
        'nim', 
        'kelas', 
        'daftar_barang', 
        'ttd_path',
    ];
}

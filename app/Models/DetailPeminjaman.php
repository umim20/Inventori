<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
public function peminjaman()
{
    return $this->belongsTo(Peminjaman::class);
}

public function barang()
{
    return $this->belongsTo(Barang::class);
}

}

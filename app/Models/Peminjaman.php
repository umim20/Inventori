<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
public function user()
{
    return $this->belongsTo(User::class);
}

public function detail()
{
    return $this->hasMany(DetailPeminjaman::class);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HistoriPeminjaman;

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

public function historiPeminjaman()
{
    return $this->hasMany(HistoriPeminjaman::class, 'nim', 'nim');
}

public function loginUser()
{
    return $this->belongsTo(LoginUser::class);
}

}



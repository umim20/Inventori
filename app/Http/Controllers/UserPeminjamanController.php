<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriPeminjaman;

class UserPeminjamanController extends Controller
{
    public function create()
    {
        $peminjamans = HistoriPeminjaman::orderBy('created_at', 'desc')->get();

        return view('user.peminjaman'); // ganti sesuai view kamu
    }
}



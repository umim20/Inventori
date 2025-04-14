<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPeminjamanController extends Controller
{
    public function create()
    {
        return view('user.peminjaman'); // ganti sesuai view kamu
    }
}



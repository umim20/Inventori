<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-petugas'); // buat file blade ini
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); // arahkan ke dashboard biasa
        }

        return back()->withErrors(['email' => 'Login gagal!']);
    }
}

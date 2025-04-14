<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-admin');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Redirect ke dashboard Filament
        return redirect()->intended(route('filament.admin.pages.dashboard'));
    }

    return back()->withErrors([
        'email' => 'Login gagal, periksa kembali email dan password Anda.',
    ]);
}

}


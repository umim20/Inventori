<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginUser;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $user = LoginUser::where('nim', $request->nim)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'user' => [
                    'id' => $user->id,
                    'nim' => $user->nim,
                    'nama' => $user->nama,
                ],
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'NIM atau password salah',
        ]);
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPeminjamanController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\PetugasLoginController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\VisitorController;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;

// ──────── Halaman Utama ────────
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ──────── Login Admin dan Petugas ────────
Route::get('/login/admin', [AdminLoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('/login/admin', [AdminLoginController::class, 'login']);
Route::get('/login/petugas', [PetugasLoginController::class, 'showLoginForm'])->name('login.petugas');
Route::post('/login/petugas', [PetugasLoginController::class, 'login']);

// ──────── Halaman Visitor ────────
Route::get('/visitor/barang', [VisitorController::class, 'index'])->name('visitor.barang');

// ──────── Area Login Wajib ────────
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'totalBarang' => Barang::count(),
            'totalPeminjaman' => Peminjaman::count(),
            'totalUser' => User::count(),
        ]);
    })->name('dashboard');

    // Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'lihat'])->name('keranjang.index');
    Route::get('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::get('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// ──────── Auth Routes (Laravel Breeze/Fortify/etc) ────────
require __DIR__.'/auth.php';

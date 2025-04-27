<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Menyimpan data inventaris baru.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'kelas' => 'required|string',
            'daftar_barang' => 'required|array', // Validasi untuk array barang
            'ttd_path' => 'nullable|string',
        ]);

        // Menyimpan data inventaris ke dalam database
        $inventaris = Inventaris::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas' => $request->kelas,
            'daftar_barang' => json_encode($request->daftar_barang),  // Menyimpan sebagai JSON string
            'ttd_path' => $request->ttd_path ?? null,
        ]);

        return response()->json([
            'message' => 'Inventaris berhasil disimpan',
            'data' => $inventaris
        ], 201);
    }

    /**
     * Menampilkan data inventaris berdasarkan NIM.
     */
    public function showByNim(Request $request)
    {
        // Mengambil NIM dari query parameter
        $nim = $request->query('nim');

        // Mencari data inventaris berdasarkan NIM
        $data = Inventaris::where('nim', $nim)->latest()->first();

        // Jika data tidak ditemukan, mengembalikan response 404
        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Mengembalikan data inventaris dalam format JSON
        return response()->json([
            'nama' => $data->nama,
            'kelas' => $data->kelas,
            'barangs' => json_decode($data->daftar_barang, true), // Decode JSON menjadi array
        ]);
    }
}

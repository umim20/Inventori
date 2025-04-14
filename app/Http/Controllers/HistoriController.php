<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriPeminjaman; // <- PENTING: Model histori yang benar
use App\Models\Barang;

class HistoriController extends Controller
{
    public function getHistori($nim)
    {
        $histori = HistoriPeminjaman::where('nim', $nim)->orderBy('created_at', 'desc')->get();
        return response()->json($histori);
    }

    public function kembalikanBarang(Request $request)
    {
        $id = $request->input('id'); // ID histori
        $histori = HistoriPeminjaman::find($id); // <- gunakan model yang benar

        if (!$histori) {
            return response()->json(['success' => false, 'message' => 'Histori tidak ditemukan'], 404);
        }

        if ($histori->status == 'kembali') {
            return response()->json(['success' => false, 'message' => 'Barang sudah dikembalikan'], 400);
        }

        // Update stok barang
        $barang = Barang::find($histori->barang_id); // <- perhatikan: barang_id, bukan id_barang
        if ($barang) {
            $barang->stok += $histori->jumlah;
            $barang->save();
        }

        // Update histori
        $histori->status = 'kembali';
        $histori->tanggal_kembali = now();
        $histori->save();

        return response()->json(['success' => true, 'message' => 'Barang berhasil dikembalikan']);
    }
}

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
    $id = $request->input('id');
    \Log::info('Request pengembalian barang masuk', ['id' => $id]);

    $histori = HistoriPeminjaman::find($id);
    if (!$histori) {
        \Log::warning('Histori tidak ditemukan', ['id' => $id]);
        return response()->json(['success' => false, 'message' => 'Histori tidak ditemukan'], 404);
    }

    if ($histori->status == 'kembali') {
        \Log::info('Barang sudah dikembalikan sebelumnya', ['id' => $id]);
        return response()->json(['success' => false, 'message' => 'Barang sudah dikembalikan'], 400);
    }

    // Update stok barang
    $barang = Barang::find($histori->barang_id);
    if ($barang) {
        \Log::info('Stok sebelum pengembalian', ['barang_id' => $barang->id, 'stok' => $barang->stok]);
        $barang->stok += $histori->jumlah;
        $barang->save();
        \Log::info('Stok setelah pengembalian', ['barang_id' => $barang->id, 'stok' => $barang->stok]);
    } else {
        \Log::warning('Barang tidak ditemukan', ['barang_id' => $histori->barang_id]);
    }

    // Update histori
    $histori->status = 'kembali';
    $histori->tanggal_kembali = now();
    $histori->save();

    \Log::info('Barang berhasil dikembalikan', [
        'histori_id' => $histori->id,
        'nim' => $histori->nim,
        'barang_id' => $histori->barang_id,
        'status' => $histori->status,
    ]);

    return response()->json(['success' => true, 'message' => 'Barang berhasil dikembalikan']);
}

}

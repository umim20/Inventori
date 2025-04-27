<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\HistoriPeminjaman;
use DB;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $items = $request->input('items'); // Format: [{id: 1, jumlah: 2}]
        $nim = $request->input('nim'); // ✅ Dapatkan nim dari input luar

        if (!$nim) {
            return response()->json(['success' => false, 'message' => 'NIM pengguna wajib dikirim.'], 400);
        }

        if (!is_array($items) || count($items) === 0) {
            return response()->json(['success' => false, 'message' => 'Data barang tidak valid.'], 400);
        }

        DB::beginTransaction();  // Memulai transaksi database

        try {
            foreach ($items as $item) {
                // Cek apakah item memiliki id dan jumlah yang valid
                if (!isset($item['id']) || !isset($item['jumlah']) || !is_numeric($item['jumlah']) || $item['jumlah'] <= 0) {
                    return response()->json(['success' => false, 'message' => 'Data barang tidak lengkap atau jumlah tidak valid.'], 400);
                }

                $barang = Barang::find($item['id']);
                if (!$barang) {
                    DB::rollBack();
                    return response()->json(['success' => false, 'message' => "Barang ID {$item['id']} tidak ditemukan."], 404);
                }

                $jumlah = $item['jumlah'];

                if ($barang->stok < $jumlah) {
                    DB::rollBack();
                    return response()->json([ 
                        'success' => false, 
                        'message' => "Stok barang '{$barang->nama}' tidak mencukupi. Tersisa: {$barang->stok}."
                    ], 400);
                }

                // Kurangi stok barang
                $barang->stok -= $jumlah;
                $barang->save();

                // Simpan histori peminjaman
                HistoriPeminjaman::create([
                    'nim' => $nim,
                    'barang_id' => $barang->id,
                    'nama_barang' => $barang->nama,
                    'jumlah' => $jumlah,
                    'status' => 'pinjam',
                ]);
            }

            DB::commit();  // Jika semuanya berhasil, lakukan commit transaksi

            return response()->json(['success' => true, 'message' => 'Checkout berhasil.']);
        } catch (\Exception $e) {
            DB::rollBack();  // Jika ada error, rollback transaksi untuk membatalkan perubahan
            \Log::error('Error processing checkout:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses checkout.',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }
}

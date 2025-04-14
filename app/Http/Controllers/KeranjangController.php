<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('visitor.barang', compact('barangs'));
    }

    public function tambah(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id]['jumlah']++;
        } else {
            $keranjang[$id] = [
                'nama' => $barang->nama,
                'jumlah' => 1,
                'stok' => $barang->stok
            ];
        }

        session()->put('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Barang ditambahkan ke keranjang!');
    }

    public function lihat()
    {
        $keranjang = session()->get('keranjang', []);
        return view('visitor.keranjang', compact('keranjang'));
    }

    public function hapus($id)
    {
        $keranjang = session()->get('keranjang');
        unset($keranjang[$id]);
        session()->put('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Barang dihapus dari keranjang!');
    }

    public function checkout()
    {
        $keranjang = session()->get('keranjang');
        if (!$keranjang || count($keranjang) == 0) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(),
            'tanggal_pinjam' => now(),
        ]);

        foreach ($keranjang as $id => $item) {
            PeminjamanDetail::create([
                'peminjaman_id' => $peminjaman->id,
                'barang_id' => $id,
                'jumlah' => $item['jumlah'],
            ]);

            Barang::where('id', $id)->decrement('stok', $item['jumlah']);
        }

        session()->forget('keranjang');
        return redirect()->route('dashboard')->with('success', 'Peminjaman berhasil!');
    }
}


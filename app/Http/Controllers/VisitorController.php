<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('visitor.barang', compact('barangs'));
    }

    public function tambahKeKeranjang(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
        ]);

        $keranjang = session()->get('keranjang', []);
        $keranjang[] = $request->barang_id;
        session(['keranjang' => $keranjang]);

        return redirect()->back()->with('success', 'Barang ditambahkan ke keranjang!');
    }
}

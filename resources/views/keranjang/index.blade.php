@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Keranjang Peminjaman</h1>

    @if(count($keranjang) > 0)
        <table class="w-full bg-white rounded shadow mb-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 text-left">Barang</th>
                    <th class="p-2 text-left">Jumlah</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keranjang as $item)
                <tr class="border-b">
                    <td class="p-2">{{ $item->barang->nama }}</td>
                    <td class="p-2">{{ $item->jumlah }}</td>
                    <td class="p-2">
                        <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Checkout</button>
        </form>
    @else
        <p>Keranjang kosong.</p>
    @endif

    <div class="mt-6">
        <a href="{{ route('visitor.barang') }}" class="text-blue-500 hover:underline">&larr; Kembali ke Barang</a>
    </div>
@endsection

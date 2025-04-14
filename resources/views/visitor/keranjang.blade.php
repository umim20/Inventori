@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-4">Keranjang Peminjaman</h2>

    @if(count($keranjang) > 0)
        <table class="w-full mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 text-left">Nama Barang</th>
                    <th class="py-2 px-4 text-center">Jumlah</th>
                    <th class="py-2 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjang as $id => $item)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $item['nama'] }}</td>
                    <td class="py-2 px-4 text-center">{{ $item['jumlah'] }}</td>
                    <td class="py-2 px-4 text-center">
                        <a href="{{ route('keranjang.hapus', $id) }}" class="text-red-500 hover:underline">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('keranjang.checkout') }}" method="POST">
            @csrf
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
                Checkout Sekarang
            </button>
        </form>
    @else
        <p class="text-gray-600">Keranjang masih kosong.</p>
    @endif

    <div class="mt-4">
        <a href="{{ url('/visitor/barang') }}" class="text-blue-500 hover:underline">← Kembali ke Daftar Barang</a>
    </div>
</div>
@endsection

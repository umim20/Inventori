@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <h2 class="text-xl font-bold">Inventori & Peminjaman Barang</h2>
        <a href="{{ url('/') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">← Kembali</a>
    </div>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded m-4">
    {{ session('success') }}
</div>
@endif

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Barang</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($barangs as $barang)
            <div class="border rounded-lg shadow-md p-4 flex flex-col justify-between bg-white hover:shadow-lg transition">
                <div>
                    <h2 class="font-bold text-lg mb-2">{{ $barang->nama }}</h2>
                    <p class="text-gray-600 mb-2">{{ $barang->deskripsi }}</p>
                    <p class="text-sm text-gray-500 mb-4">Stok: {{ $barang->stok }}</p>
                </div>

                <div class="mt-auto">
                    @auth
                        <a href="{{ route('keranjang.tambah', ['id' => $barang->id]) }}"
                           class="w-full block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                            Tambah ke Keranjang
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="w-full block text-center bg-gray-500 text-white py-2 rounded hover:bg-gray-600">
                            Login untuk Meminjam
                        </a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

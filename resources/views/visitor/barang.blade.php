@extends('layouts.app')

@section('content')

<!-- Flash Success -->
@if(session('success'))
    <div class="container mx-auto px-6 mt-6">
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
    </div>
@endif

<!-- Barang Section -->
<div class="container mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-green-800 mb-8 text-center">Daftar Barang Tersedia</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse ($barangs as $barang)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition border-t-4 border-green-600 flex flex-col justify-between p-5">
                <div>
                    <h2 class="text-lg font-bold text-green-700 mb-2">{{ $barang->nama }}</h2>
                    <p class="text-gray-600 text-sm mb-3">{{ $barang->deskripsi }}</p>
                    <p class="text-sm text-gray-500 mb-4">Stok: <span class="font-semibold">{{ $barang->stok }}</span></p>
                </div>

                <div class="mt-auto">
                    @auth
                        <a href="{{ route('keranjang.tambah', ['id' => $barang->id]) }}"
                           class="block text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded transition">
                            Tambah ke Keranjang
                        </a>
                    @else
                        <a href="#"
                           class="block text-center bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 rounded transition">
                            Silahkan Login di Aplikasi ToolMate untuk meminjam barang!!!
                        </a>
                    @endauth
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Tidak ada barang yang tersedia saat ini.</p>
        @endforelse
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-8">
    <div class="flex items-center justify-between">
        <h1 class="text-4xl font-bold text-gray-800 flex items-center gap-2">
            <x-heroicon-o-presentation-chart-bar class="w-8 h-8 text-indigo-600" />
            Dashboard
        </h1>
        <a href="{{ route('peminjaman.form') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl text-sm shadow-md transition">
            <x-heroicon-o-user-plus class="w-5 h-5" />
            Tambah Peminjaman
        </a>
    </div>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white border-l-4 border-indigo-500 shadow-md rounded-xl p-5 transition hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Barang</p>
                    <h2 class="text-3xl font-bold text-indigo-700 mt-1">{{ $totalBarang }}</h2>
                </div>
                <x-heroicon-o-archive-box class="w-8 h-8 text-indigo-500" />
            </div>
        </div>
        <div class="bg-white border-l-4 border-green-500 shadow-md rounded-xl p-5 transition hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Peminjaman</p>
                    <h2 class="text-3xl font-bold text-green-600 mt-1">{{ $totalPeminjaman }}</h2>
                </div>
                <x-heroicon-o-document-text class="w-8 h-8 text-green-500" />
            </div>
        </div>
        <div class="bg-white border-l-4 border-yellow-500 shadow-md rounded-xl p-5 transition hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total User</p>
                    <h2 class="text-3xl font-bold text-yellow-600 mt-1">{{ $totalUser }}</h2>
                </div>
                <x-heroicon-o-users class="w-8 h-8 text-yellow-500" />
            </div>
        </div>
    </div>

    {{-- Tabel Peminjaman Terbaru --}}
    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <x-heroicon-o-clock class="w-6 h-6 text-indigo-500" />
            Peminjaman Terbaru
        </h3>
        <div class="overflow-x-auto rounded-md">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Barang</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($peminjamanTerbaru as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-700">{{ $item->user->name }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $item->detail->pluck('barang.nama')->join(', ') }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $item->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">Belum ada data peminjaman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

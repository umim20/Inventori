<x-filament::page>
    <div x-data="{ darkMode: false }" :class="darkMode ? 'dark' : ''">
        {{-- Toggle Mode Gelap --}}
        <div class="flex justify-end mb-4">
            <button @click="darkMode = !darkMode"
                class="flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-xl shadow-md bg-green-600 hover:bg-green-700 text-white transition">
                <template x-if="!darkMode">
                    <span>🌙 Dark Mode</span>
                </template>
                <template x-if="darkMode">
                    <span>☀ Light Mode</span>
                </template>
            </button>
        </div>

        {{-- Statistik --}}
        <div class="space-y-8" data-aos="fade-up" data-aos-delay="100">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Selamat Datang di Dashboard</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow border-l-4 border-green-500" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-sm text-gray-500 dark:text-gray-300">Total Barang</p>
                    <h2 class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $totalBarang }}</h2>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow border-l-4 border-blue-500" data-aos="fade-up" data-aos-delay="300">
                    <p class="text-sm text-gray-500 dark:text-gray-300">Total Peminjaman</p>
                    <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $totalPeminjaman }}</h2>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow border-l-4 border-yellow-500" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-sm text-gray-500 dark:text-gray-300">Total Login User</p>
                    <h2 class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ $totalLoginUser }}</h2>
                </div>
            </div>
        </div>

        {{-- List Peminjaman Terbaru --}}
        <div class="mt-12" data-aos="fade-up" data-aos-delay="500">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Peminjaman Terbaru</h2>
            <div class="overflow-auto rounded-xl shadow bg-white dark:bg-gray-800">
                <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">NIM</th>
                            <th scope="col" class="px-6 py-3">Nama Barang</th>
                            <th scope="col" class="px-6 py-3">Nama Peminjam</th>
                            <th scope="col" class="px-6 py-3">Tanggal Pinjam</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamanTerbaru as $item)
                            <tr class="border-t dark:border-gray-600">
                                <td class="px-6 py-4">{{ $item->loginUser->nim ?? '_' }}</td>
                                <td class="px-6 py-4">{{ $item->barang->nama ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $item->loginUser->nama ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $item->created_at->format('d M Y - H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">Belum ada peminjaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-filament::page>

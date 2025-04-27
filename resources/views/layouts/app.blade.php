<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Inventori & Peminjaman')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css') {{-- pastikan Vite aktif --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 font-sans tracking-normal">

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Kampus" class="w-10 h-10 hidden sm:block">
                <a href="{{ url('/') }}" class="text-xl font-bold text-green-700 dark:text-green-400 hover:text-green-800 transition">
                    Inventori & Peminjaman
                </a>
            </div>

            <!-- Desktop Button -->
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ url('/') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition">
                    ← Kembali
                </a>
                <button onclick="toggleDark()" class="text-xl text-gray-700 dark:text-gray-300">
                    🌙/☀️
                </button>
            </div>

            <!-- Mobile Burger -->
            <button id="drawerToggle" class="md:hidden text-green-700 dark:text-green-400 text-2xl">
                ☰
            </button>
        </div>
    </nav>

    <!-- Drawer Menu -->
    <div id="drawerMenu" class="fixed top-0 left-0 w-64 h-full bg-white dark:bg-gray-800 shadow transform -translate-x-full transition-transform z-50">
        <div class="p-4 border-b border-gray-300 dark:border-gray-600 flex justify-between items-center">
            <span class="font-bold text-green-700 dark:text-green-300">Menu</span>
            <button id="closeDrawer" class="text-gray-700 dark:text-gray-300 text-xl">✕</button>
        </div>
        <ul class="p-4 space-y-4">
            <li><a href="{{ url('/') }}" class="text-green-600 dark:text-green-400">← Kembali</a></li>
            <li><a href="{{ route('visitor.barang') }}" class="text-green-600 dark:text-green-400">Lihat Barang</a></li>
            <li>
                <button onclick="toggleDark()" class="w-full text-left text-green-600 dark:text-green-400">
                    🌙/☀️ Mode Gelap
                </button>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <main class="container mx-auto px-6 py-6" data-aos="fade-up">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 text-center py-6 mt-12 text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-600">
        &copy; {{ date('Y') }} Sistem Inventori & Peminjaman Barang AE Polman Bandung
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        // Drawer toggle
        document.getElementById('drawerToggle').onclick = () => {
            document.getElementById('drawerMenu').classList.remove('-translate-x-full');
        };
        document.getElementById('closeDrawer').onclick = () => {
            document.getElementById('drawerMenu').classList.add('-translate-x-full');
        };

        // Dark mode toggle
        function toggleDark() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        }

        // Persist theme
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>
</html>

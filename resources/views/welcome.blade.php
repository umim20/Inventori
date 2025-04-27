<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventori & Peminjaman Barang - Teknik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .gear-bg {
            background-image: url('https://www.transparenttextures.com/patterns/connected.png');
        }
        .dark .gear-bg {
            background-color: #1f2937;
        }
    </style>
</head>
<body class="bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200 transition-colors duration-300">
    <!-- Navbar -->
    <nav class="bg-green-800 text-white dark:bg-green-900 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-full bg-white shadow">
                <span class="text-lg font-bold">Automation Engineering</span>
            </div>
            <div class="hidden md:flex gap-6 items-center">
                <a href="#" class="hover:underline">Beranda</a>
                <a href="#fitur" class="hover:underline">Fitur</a>
                <a href="#kontak" class="hover:underline">Kontak</a>
                <button id="darkToggle" class="ml-4">🌙</button>
            </div>
            <div class="md:hidden">
                <button id="menuToggle" class="text-2xl">☰</button>
            </div>
        </div>
        <div id="mobileMenu" class="hidden md:hidden px-6 pb-4 bg-green-800 dark:bg-green-900">
            <a href="#" class="block py-2">Beranda</a>
            <a href="#fitur" class="block py-2">Fitur</a>
            <a href="#kontak" class="block py-2">Kontak</a>
            <button id="darkToggleMobile" class="w-full text-left py-2">🌙 Mode Gelap</button>
        </div>
    </nav>

    <!-- Hero -->
    <header class="bg-gradient-to-br from-green-100 to-white dark:from-green-900 dark:to-gray-800 py-24 text-center gear-bg">
        <div class="max-w-4xl mx-auto px-6" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-green-700 dark:text-green-300 mb-4">Sistem Inventori & Peminjaman</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">Solusi digital untuk alat laboratorium teknik.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('visitor.barang') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow">Visitor</a>
                <a href="{{ url('/admin/login') }}" class="bg-white dark:bg-gray-700 border border-green-600 text-green-700 dark:text-green-300 px-6 py-3 rounded-lg shadow">Login Admin</a>
            </div>
        </div>
    </header>

    <!-- Fitur -->
    <section id="fitur" class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-green-800 dark:text-green-300 mb-12" data-aos="fade-up">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ([
                    ['title' => 'Peminjaman Online', 'desc' => 'Pinjam alat langsung dari sistem.'],
                    ['title' => 'Tracking Stok', 'desc' => 'Pantau stok dan lokasi alat.'],
                    ['title' => 'Laporan & Statistik', 'desc' => 'Export PDF/Excel dan grafik.']
                ] as $fitur)
                <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow border-t-4 border-green-600" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-xl font-semibold text-green-700 dark:text-green-300 mb-2">{{ $fitur['title'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ $fitur['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-3xl mx-auto px-6 text-center" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-green-800 dark:text-green-300 mb-6">Kontak Kami</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Hubungi kami untuk info lebih lanjut:</p>
            <a href="mailto:labmotorlistrikteknikpenggerak@gmail.com" class="text-green-700 dark:text-green-300 font-semibold hover:underline">labmotorlistrikteknikpenggerak@gmail.com</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-800 dark:bg-green-900 text-white py-6">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} Automation Engineering.</p>
            <div class="flex gap-4 text-sm">
                <a href="#" class="hover:underline">Kebijakan</a>
                <a href="#" class="hover:underline">Syarat</a>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        const html = document.documentElement;
        const darkBtn = document.getElementById('darkToggle');
        const darkBtnMobile = document.getElementById('darkToggleMobile');
        const menuBtn = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        darkBtn?.addEventListener('click', () => html.classList.toggle('dark'));
        darkBtnMobile?.addEventListener('click', () => html.classList.toggle('dark'));
        menuBtn?.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    </script>
</body>
</html>

<x-filament::page>
    <!-- Dark Mode Toggle -->
    <div class="flex justify-end mb-4">
        <button id="themeToggle" class="p-2 rounded-full border border-green-400 text-green-500 hover:bg-green-100 dark:hover:bg-green-800 transition-all">
            <span id="themeIcon">🌙</span>
        </button>
    </div>

    <h1 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400" data-aos="fade-down">
        Selamat Datang di Dashboard Admin
    </h1>

    <!-- Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
        <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl border border-green-100 dark:border-green-800 transition-all">
            <h2 class="text-xl font-semibold text-green-600 dark:text-green-400 mb-2">Jumlah Barang</h2>
            <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">123</p>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl border border-green-100 dark:border-green-800 transition-all">
            <h2 class="text-xl font-semibold text-green-600 dark:text-green-400 mb-2">Total User</h2>
            <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">42</p>
        </div>

        <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl border border-green-100 dark:border-green-800 transition-all">
            <h2 class="text-xl font-semibold text-green-600 dark:text-green-400 mb-2">Barang Dipinjam</h2>
            <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">75</p>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        AOS.init();

        // Dark mode toggle
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('themeToggle');
            const icon = document.getElementById('themeIcon');
            const html = document.documentElement;

            // Check local storage
            if (localStorage.getItem('theme') === 'dark') {
                html.classList.add('dark');
                icon.textContent = '☀️';
            }

            toggle.addEventListener('click', () => {
                html.classList.toggle('dark');
                const isDark = html.classList.contains('dark');
                icon.textContent = isDark ? '☀️' : '🌙';
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        });
    </script>
</x-filament::page>

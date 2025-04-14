<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Inventori & Peminjaman')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css') {{-- pastikan Vite diaktifkan --}}
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-white shadow mb-4">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-bold text-gray-700">Inventori & Peminjaman</a>
            <div>
                <a href="{{ route('visitor.barang') }}" class="mr-4 text-blue-500 hover:underline">Lihat Barang</a>
                @auth
                    <a href="{{ route('keranjang.index') }}" class="text-blue-500 hover:underline">Keranjang</a>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4">
        @yield('content')
    </main>

    <footer class="text-center py-4 text-gray-600 mt-8">
        &copy; {{ date('Y') }} Inventori & Peminjaman
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventori & Peminjaman Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-white min-h-screen flex items-center justify-center">

    <div class="text-center p-6 bg-white shadow-xl rounded-2xl max-w-xl w-full">
        <h1 class="text-4xl font-bold text-indigo-700 mb-4">Inventori & Peminjaman Barang</h1>
        <p class="text-gray-600 mb-6">
            Sistem informasi untuk melihat dan mengelola data peminjaman barang. Silakan pilih peran Anda.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('visitor.barang') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition shadow">
                Masuk sebagai Visitor
            </a>
            <a href="{{ url('/admin/login') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg transition shadow">
                Login Admin
            </a>
            <a href="{{ route('login.petugas') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition shadow">
                Login Petugas
            </a>
        </div>
        <div class="mt-6 text-sm text-gray-400">
            &copy; {{ date('Y') }} Sistem Inventori & Peminjaman Barang
        </div>
    </div>

</body>
</html>

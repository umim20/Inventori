<?php

namespace App\Filament\Pages;

use App\Models\Barang;
use App\Models\LoginUser;
use App\Models\HistoriPeminjaman;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    protected function getViewData(): array
    {
        return [
            'totalBarang' => Barang::count(),
            'totalPeminjaman' => HistoriPeminjaman::where('status', 'pinjam')->count(),
            'totalLoginUser' => LoginUser::count(),
            'peminjamanTerbaru' => HistoriPeminjaman::with(['barang', 'loginUser'])
                ->where('status', 'pinjam')
                ->latest()
                ->take(5)
                ->get(),
        ];
    }
}

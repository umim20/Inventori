<?php

namespace App\Filament\Resources\PeminjamanResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class HistoriPeminjamanRelationManager extends RelationManager
{
    protected static string $relationship = 'historiPeminjaman';
    protected static ?string $title = 'Histori Peminjaman';

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_barang')->label('Barang'),
                Tables\Columns\TextColumn::make('jumlah')->label('Jumlah'),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn ($state) => match ($state) {
                    'dikembalikan' => 'success',
                    'terlambat' => 'danger',
                    default => 'gray',
                }),
                Tables\Columns\TextColumn::make('tanggal_kembali')->label('Tanggal Kembali')->date(),
                Tables\Columns\TextColumn::make('created_at')->label('Dicatat Pada')->since(),
            ])
            ->filters([])
            ->headerActions([]) // Tidak ada tombol tambah
            ->actions([])       // Tidak bisa edit
            ->bulkActions([]);  // Tidak bisa bulk delete
    }
}

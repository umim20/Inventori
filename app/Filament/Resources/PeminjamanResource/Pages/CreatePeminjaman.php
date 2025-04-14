<?php

namespace App\Filament\Resources\PeminjamanResource\Pages;

use App\Filament\Resources\PeminjamanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeminjaman extends CreateRecord
{
    protected static string $resource = PeminjamanResource::class;

    public static function afterCreate(CreateRecord $operation, Model $record)
        {
            foreach ($record->detail as $item) {
                $barang = $item->barang;
                $barang->stok -= $item->jumlah;
                $barang->save();
            }
        }

}

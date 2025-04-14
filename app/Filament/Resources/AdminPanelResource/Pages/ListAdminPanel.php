<?php

namespace App\Filament\Resources\AdminPanelResource\Pages;

use App\Filament\Resources\AdminPanelResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\CreateAction;

class ListAdminPanel extends ListRecords
{
    protected static string $resource = AdminPanelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah User'), // ✅ Tombol tambah data
        ];
    }
}

<?php

namespace App\Filament\Resources\AdminPanelResource\Pages;

use App\Filament\Resources\AdminPanelResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditAdminPanel extends EditRecord
{
    protected static string $resource = AdminPanelResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Hanya hash ulang jika password diubah
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }
}

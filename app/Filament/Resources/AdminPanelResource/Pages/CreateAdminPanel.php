<?php

namespace App\Filament\Resources\AdminPanelResource\Pages;

use App\Filament\Resources\AdminPanelResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateAdminPanel extends CreateRecord
{
    protected static string $resource = AdminPanelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Hash password sebelum disimpan
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}

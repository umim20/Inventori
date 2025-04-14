<?php

namespace App\Filament\Resources\AdminPanelResource\Pages;

use App\Filament\Resources\AdminPanelResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends CreateRecord
{
    protected static string $resource = AdminPanelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}

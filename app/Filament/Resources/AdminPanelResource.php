<?php

namespace App\Filament\Resources;

use App\Models\LoginUser;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\AdminPanelResource\Pages;
use Illuminate\Support\Facades\Hash;

class AdminPanelResource extends Resource
{
    protected static ?string $model = LoginUser::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Manajemen User';
    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('NIM'),

                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama'),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->required(fn (string $context) => $context === 'create')
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn ($state) => filled($state))
                    ->autocomplete('new-password'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kelas')->label('Kelas'),
                Tables\Columns\TextColumn::make('no_telepon')->label('No Telepon'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y - H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdminPanel::route('/'),
            'create' => Pages\CreateAdminPanel::route('/create'),
            'edit' => Pages\EditAdminPanel::route('/{record}/edit'),
        ];
    }
}

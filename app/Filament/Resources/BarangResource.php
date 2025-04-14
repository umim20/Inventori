<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Barang';
    protected static ?string $navigationGroup = 'Manajemen Inventaris';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\TextInput::make('nama')
            ->required()
            ->maxLength(100),

        Forms\Components\TextInput::make('kode')
            ->required()
            ->maxLength(50),

        Forms\Components\Textarea::make('deskripsi')
            ->rows(3),

        Forms\Components\TextInput::make('stok')
            ->numeric()
            ->required()
            ->minValue(0),
    ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')->searchable(),
            Tables\Columns\TextColumn::make('kode')->searchable(),
            Tables\Columns\TextColumn::make('stok'),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}

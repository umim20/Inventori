<?php

namespace App\Filament\Pages;

use App\Models\LoginUser;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class RegisterLoginUser extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $nim;
    public $nama;
    public $password;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static string $view = 'filament.pages.register-login-user';
    protected static ?string $navigationLabel = 'Register Login User';

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nim')
                ->label('NIM')
                ->required(),

            Forms\Components\TextInput::make('nama')
                ->label('Nama')
                ->required(),

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(),
        ];
    }

    public function register()
    {
        $data = $this->form->getState();

        // Pastikan nama kolom sesuai dengan yang ada di tabel login_users
        LoginUser::create([
            'nim' => $data['nim'],  // Kolom harus sesuai dengan database
            'nama' => $data['nama'],
            'password' => Hash::make($data['password']),  // Hash password
        ]);

        Notification::make()
            ->title('Registrasi Berhasil')
            ->body('User berhasil didaftarkan.')
            ->success()
            ->send();

        // Kosongkan form setelah sukses
        $this->form->fill();
    }
}

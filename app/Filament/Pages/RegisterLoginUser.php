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
    public $kelas;
    public $no_telepon;
    public $email;
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

            Forms\Components\TextInput::make('kelas')
                ->label('Kelas')
                ->required(),

            Forms\Components\TextInput::make('no_telepon')
                ->label('No Telepon')
                ->tel()
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
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

        LoginUser::create([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'kelas' => $data['kelas'],
            'no_telepon' => $data['no_telepon'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Notification::make()
            ->title('Registrasi Berhasil')
            ->body('User berhasil didaftarkan.')
            ->success()
            ->send();

        $this->form->fill(); // Kosongkan form
    }
}

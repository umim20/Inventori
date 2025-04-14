<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LoginUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'login_users';

    protected $fillable = ['nim', 'nama', 'password'];

    protected $hidden = ['password'];
}

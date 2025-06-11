<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // <-- 1. Import trait ini

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // <-- 2. Gunakan trait ini

    protected $table = 'admins';
    protected $primaryKey = 'karyawan_id';

    protected $fillable = [
        'username_k',
        'password_k',
        'email',
        'posisi',
        'gaji',
        'tanggal_diterima',
    ];

    protected $hidden = [
        'password_k',
    ];

    public function getAuthPasswordName()
    {
        return 'password_k';
    }
}

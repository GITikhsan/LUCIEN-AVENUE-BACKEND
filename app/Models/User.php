<?php

namespace App\Models;

// 1. Tambahkan import untuk HasApiTokens
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nama tabel yang terhubung dengan model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Primary key untuk model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'tanggal_lahir',
        'alamat',
        'email',
        'password',
        'role',
        'pembelian',
        'pengembalian',
        'no_telepon',
        'jenis_kelamin',
    ];

    /**
     * Atribut yang harus disembunyikan.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi: Satu User bisa memiliki banyak Order.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'user_id');
    }

    /**
     * Relasi: Satu User bisa memiliki banyak Management record.
     */
    public function managements()
    {
        return $this->hasMany(Management::class, 'user_id', 'user_id');
    }

    /**
     * Relasi: Satu User bisa memiliki banyak Pengembalian (returns) melalui Order.
     * Ini adalah relasi hasManyThrough.
     */
    public function returns()
    {
        return $this->hasManyThrough(
            OrderReturn::class,
            Order::class,
            'user_id',
            'pesanan_id',
            'user_id',
            'pesanan_id'
        );
    }
}

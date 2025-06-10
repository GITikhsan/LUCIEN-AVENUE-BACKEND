<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'karyawan_id';

    protected $fillable = [
        'username_k',
        'password_k',
        'email',
        'posisi',
        'gaji',
        'tanggal_diterima',
        'pengiriman_id',
        'produk_id',
        'manajemen_id',
    ];

    protected $hidden = [
        'password_k',
    ];

    // Relasi-relasi di bawah ini dibuat berdasarkan permintaan,
    // namun secara logika bisnis mungkin perlu ditinjau kembali.

    /**
     * Relasi: Satu Admin terhubung dengan satu Pengiriman.
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'pengiriman_id', 'pengiriman_id');
    }

    /**
     * Relasi: Satu Admin terhubung dengan satu Produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'produk_id', 'produk_id');
    }

    /**
     * Relasi: Satu Admin terhubung dengan satu record Management.
     */
    public function management()
    {
        return $this->belongsTo(Management::class, 'manajemen_id', 'manajemen_id');
    }
}

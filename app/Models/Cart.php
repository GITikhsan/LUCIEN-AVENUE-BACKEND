<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     * Sesuaikan dengan nama kolom di database Anda.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'produk_id',
        'kuantitas', // Menggunakan 'kuantitas'
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model Product.
     * Ini penting agar with('product') bisa berfungsi.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }
}

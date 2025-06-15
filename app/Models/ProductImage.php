<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    // Definisikan primary key custom jika ada
    protected $primaryKey = 'gambar_produk_id';

    /**
     * Tentukan kolom mana saja yang boleh diisi secara massal (mass assignment).
     * Ini penting untuk keamanan dan kemudahan saat membuat data baru.
     *
     * @var array
     */
    protected $fillable = ['produk_id', 'path'];

    /**
     * Mendefinisikan relasi "belongsTo": Satu gambar dimiliki oleh SATU produk.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        // Laravel akan menghubungkan 'produk_id' di tabel ini
        // dengan 'produk_id' di tabel Product.
        return $this->belongsTo(Product::class, 'produk_id', 'produk_id');
    }
}

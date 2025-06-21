<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

// Hanya import ProductImage karena hanya itu yang kita pakai
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'produk_id';

    /**
     * Atribut yang dapat diisi.
     * Field 'diskon_id' dan 'promo_id' sudah dihapus.
     */
    protected $fillable = [
        'nama_sepatu',
        'brand',
        'material',
        'ukuran',
        'warna',
        'gender',
        'tanggal_rilis',
        'sku',
        'dimensi',
        'stok',
        'harga_retail',
        'deskripsi',
    ];

    /**
     * Relasi ke banyak gambar. Ini adalah satu-satunya relasi yang kita pertahankan.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'produk_id', 'produk_id');
    }

    // Fungsi relasi discount() dan promotion() sudah dihapus sepenuhnya.
}

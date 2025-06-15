<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'produk_id';

    /**
     * Atribut yang dapat diisi.
     */
    protected $fillable = [
        'nama_sepatu',
        'brand',
        'jenis',
        'material',
        'ukuran',
        'warna',
        'gender',
        'tanggal_rilis',
        'sku',
        'dimensi',
        'harga_retail',
        'deskripsi',
        'diskon_id',
        'gambar_produk_id',
        'promo_id',
        'image',
    ];

    /**
     * Relasi: Satu Produk memiliki satu Gambar (ProductImage).
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Ini akan menghasilkan URL lengkap ke gambar,
            // contoh: http://localhost:8000/storage/products/nama-file-gambar.jpg
            return asset('images/' . $this->image);
        }

        // Gambar default jika produk tidak punya gambar
        return asset('images/placeholder.jpg');
    }

    /**
     * Kita tambahkan cast untuk harga agar selalu menjadi angka.
     */
    protected $casts = [
        'harga_retail' => 'float',
    ];

    /**
     * Relasi: Satu Produk memiliki satu Diskon.
     */
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'diskon_id', 'diskon_id');
    }

    /**
     * Relasi: Satu Produk memiliki satu Promosi.
     */
    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promo_id', 'promo_id');
    }
}

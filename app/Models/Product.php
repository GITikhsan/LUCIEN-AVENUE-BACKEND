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
    public function productImage()
    {
        return $this->belongsTo(ProductImage::class, 'gambar_produk_id', 'gambar_produk_id');
    }

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

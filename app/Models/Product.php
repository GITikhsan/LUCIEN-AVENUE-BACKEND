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
        'promo_id',
    ];

    /**
     * Relasi: Satu Produk memiliki satu Gambar (ProductImage).
     */
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'produk_id');
    }

    /**
     * Pastikan relasi lain juga sudah benar.
     */
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'diskon_id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promo_id');
    }
}

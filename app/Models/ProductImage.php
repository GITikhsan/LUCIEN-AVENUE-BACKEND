<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $primaryKey = 'gambar_produk_id';

    protected $fillable = ['gambar', 'waktu_upload'];

    // Model ini biasanya tidak memiliki relasi keluar,
    // tapi menjadi tujuan relasi dari model Product.
}

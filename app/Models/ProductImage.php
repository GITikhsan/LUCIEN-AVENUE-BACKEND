<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'gambar_produk_id';

    // Nama tabel jika tidak mengikuti konvensi Laravel (product_images)
    // protected $table = 'nama_tabel_gambarmu';

    /**
     * Tentukan kolom mana saja yang boleh diisi secara massal.
     * @var array
     */
    protected $fillable = [
        'produk_id',
        'image_path' // <<< Baris 'path' sudah dihapus dari sini
    ];

    /**
     * Mendefinisikan relasi "belongsTo": Satu gambar dimiliki oleh SATU produk.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'produk_id', 'produk_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';
    protected $primaryKey = 'promo_id';
    public $timestamps = false; // Karena tidak ada kolom timestamps di migrasi

    protected $fillable = ['nama_promo', 'mulai_tanggal', 'selesai_tanggal', 'diskonP', 'kode'];

    /**
     * Relasi: Satu Promosi bisa dimiliki oleh banyak Produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'promo_id', 'promo_id');
    }
}

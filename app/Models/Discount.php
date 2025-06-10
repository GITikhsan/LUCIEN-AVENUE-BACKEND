<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';
    protected $primaryKey = 'diskon_id';
    public $timestamps = false; // Karena tidak ada kolom timestamps di migrasi

    protected $fillable = ['diskon', 'tanggal_mulai', 'tanggal_selesai'];

    /**
     * Relasi: Satu Diskon bisa dimiliki oleh banyak Produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'diskon_id', 'diskon_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $primaryKey = 'barang_pesanan_id';
    public $timestamps = false;

    protected $fillable = ['harga','produk_id', 'quantity', 'pesanan_id'];

    public function product()
    {
        // Sesuaikan 'produk_id' dengan nama foreign key di tabel Anda
        return $this->belongsTo(Product::class, 'produk_id', 'produk_id');
    }
    /**
     * Relasi: Satu OrderItem dimiliki oleh satu Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'pesanan_id', 'pesanan_id');
    }
}

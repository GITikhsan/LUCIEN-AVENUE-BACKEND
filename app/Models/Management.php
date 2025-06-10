<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;

    protected $table = 'managements';
    protected $primaryKey = 'manajemen_id';

    protected $fillable = ['pesanan_id', 'produk_id', 'keranjang_id', 'user_id'];

    /**
     * Relasi: Satu record Management dimiliki oleh satu Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'pesanan_id', 'pesanan_id');
    }

    /**
     * Relasi: Satu record Management dimiliki oleh satu Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'produk_id', 'produk_id');
    }

    /**
     * Relasi: Satu record Management dimiliki oleh satu Cart.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'keranjang_id', 'keranjang_id');
    }

    /**
     * Relasi: Satu record Management dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

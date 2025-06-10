<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'pesanan_id';

    protected $fillable = ['tanggal_pesanan', 'jumlah_total', 'status_pesanan', 'user_id'];

    /**
     * Relasi: Satu Order dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Relasi: Satu Order memiliki banyak OrderItem (barang).
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'pesanan_id', 'pesanan_id');
    }

    /**
     * Relasi: Satu Order memiliki satu Pembayaran.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'pesanan_id', 'pesanan_id');
    }

    /**
     * Relasi: Satu Order memiliki satu Pengiriman.
     */
    public function shipment()
    {
        return $this->hasOne(Shipment::class, 'pesanan_id', 'pesanan_id');
    }

    /**
     * Relasi: Satu Order memiliki satu Pengembalian.
     */
    public function orderReturn()
    {
        return $this->hasOne(OrderReturn::class, 'pesanan_id', 'pesanan_id');
    }
}

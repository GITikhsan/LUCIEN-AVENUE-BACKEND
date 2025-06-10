<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipments';
    protected $primaryKey = 'pengiriman_id';

    protected $fillable = ['track_nomor', 'metode_pengiriman', 'status_pengiriman', 'perkiraan_pengiriman', 'pesanan_id'];

    /**
     * Relasi: Satu Pengiriman dimiliki oleh satu Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'pesanan_id', 'pesanan_id');
    }
}

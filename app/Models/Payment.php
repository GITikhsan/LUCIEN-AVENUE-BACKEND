<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    

    protected $primaryKey = 'pembayaran_id';
    public $timestamps = false;

    protected $fillable = [
        'metode_pembayaran',
        'password',
        'status_pembayaran',
        'jumlah',
        'pesanan_id',
    ];

    /**
     * Relasi: Satu Pembayaran dimiliki oleh satu Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'pesanan_id', 'pesanan_id');
    }
}

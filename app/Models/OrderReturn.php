<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReturn extends Model
{
    use HasFactory;

    // Nama tabel di database adalah 'returns'
    protected $table = 'returns';

    protected $primaryKey = 'pengembalian_id';

    protected $fillable = ['pembelian', 'pengembalian', 'pesanan_id'];

    /**
     * Relasi: Satu Pengembalian dimiliki oleh satu Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'pesanan_id', 'pesanan_id');
    }
}

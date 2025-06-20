<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $primaryKey = 'promo_id';
    public $timestamps = false;

    protected $fillable = [
        'nama_promo',
        'kode',
        'diskonP',
        'mulai_tanggal',
        'selesai_tanggal',
    ];
}

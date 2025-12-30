<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rekapPenjualan extends Model
{
    protected $table = 'rekapPenjualan';

    protected $fillable = [
        'tanggal',
        'totalTransaksi',
        'totalPendapatan'
    ];

    public function rekapPayments() {
        return $this->hasMany(rekapPayment::class, 'rekapPenjualan_id');
    }
}

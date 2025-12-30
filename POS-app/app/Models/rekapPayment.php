<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rekapPayment extends Model
{
    protected $table = 'rekapPayments';

    protected $fillable = [
        'rekapPenjualan_id',
        'paymentMethod',
        'jmlTransaksi',
        'totalPendapatan'
    ];

    public function rekapPenjualan() {
        return $this->belongsTo(rekapPenjualan::class, 'rekapPenjualan_id');
    }
}

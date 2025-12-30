<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'idTransaksi';

    protected $fillable =[
        'id_pegawai',
        'namaCust',
        'paymentMethod',
        'totalHarga',
        'totalBayar',
        'totalKembali'
    ];
    
    public function detail(){
        return $this->hasMany(transaksiDetail::class, 'idDetail', 'idDetail');
    }

    public function pegawai() {
        return $this->belongsTo(pegawai::class, 'idPegawai', 'idPegawai');
    }
}

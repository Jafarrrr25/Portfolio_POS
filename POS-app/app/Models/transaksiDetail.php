<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksiDetail extends Model
{

    protected $table ='transaksiDetail';

    protected $fillable=[
        'id_transaksi',
        'id_produk',
        'namaMenu',
        'qty',
        'hargaMenu',
        'subTotal'
    ];

    public function detail(){
        return $this->hasMany(transaksiDetail::class, 'idDetail', 'idDetail');
    }

    public function addons() {
        return $this->hasMany(transaksiAddon::class, 'idAddons', 'idAddons');
    }
}
    
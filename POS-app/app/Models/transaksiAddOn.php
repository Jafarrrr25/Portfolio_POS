<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksiAddOn extends Model
{

    protected $table ='addOnsTransaksi';

    protected $fillable=[
        'id_detail',
        'id_add_ons',
        'menuAddOns',
        'hargaAddons'
    ];

    public function detail(){
        return $this->belongsTo(transaksiDetail::class, 'idDetail', 'idDetail');
    }
}

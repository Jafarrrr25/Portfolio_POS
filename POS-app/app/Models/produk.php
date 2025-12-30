<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey ='idProduk';

    protected $fillable =[
        'namaMenu',
        'tipeMenu',
        'fotoMenu',
        'jmlStok',
        'hargaMenu',
        'status'
    ];

    public function menuKategori() {
        return $this->belongsTo(menuKategori::class, 'idKategori', 'idKategori');
    }
}

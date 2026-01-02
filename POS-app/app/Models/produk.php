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
        'statusMenu'
    ];

    public function menuKategori() {
        return $this->belongsTo(menuKategori::class, 'id_kategori', 'idKategori');
    }

}
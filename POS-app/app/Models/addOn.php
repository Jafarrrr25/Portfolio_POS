<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addOn extends Model
{
    protected $table='addons';

    protected $fillable =[
        'namaTambahan',
        'tipeMenu',
        'jmlStok',
        'hargaMenu',
        'statusMenu'
    ];

    public function menuKategori() {
        return $this->belongsTo(menuKategori::class, 'idKategori', 'idKategori');
    }
}
